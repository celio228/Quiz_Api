<?php

namespace App\Http\Controllers;

use App\Models\QuizResponse;
use App\Models\UserScore;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function submitAnswers(Request $request)
    {
        $validated = $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.option_id' => 'required|exists:options,id',
        ]);

        $user = $request->user();
        $themeId = $validated['theme_id'];
        $answers = $validated['answers'];

        DB::beginTransaction();

        try {
            $totalPoints = 0;
            $correctAnswers = 0;

            foreach ($answers as $answer) {
                $question = Question::find($answer['question_id']);
                $selectedOption = Option::find($answer['option_id']);
                $isCorrect = $selectedOption->is_correct;

                // Check if user already answered this question
                $existingResponse = QuizResponse::where('user_id', $user->id)
                    ->where('question_id', $question->id)
                    ->first();

                if ($existingResponse) {
                    continue; // Skip if already answered
                }

                $pointsEarned = $isCorrect ? $question->points : 0;

                QuizResponse::create([
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'option_id' => $selectedOption->id,
                    'is_correct' => $isCorrect,
                    'points_earned' => $pointsEarned,
                ]);

                if ($isCorrect) {
                    $totalPoints += $pointsEarned;
                    $correctAnswers++;
                }
            }

            // Update user's total points
            $user->increment('points', $totalPoints);

            // Update phase score
            $phaseId = $question->theme->phase_id;
            $userScore = UserScore::firstOrCreate(
                ['user_id' => $user->id, 'phase_id' => $phaseId],
                ['total_points' => 0, 'questions_answered' => 0]
            );

            $userScore->increment('total_points', $totalPoints);
            $userScore->increment('questions_answered', count($answers));

            DB::commit();

            return response()->json([
                'total_points_earned' => $totalPoints,
                'correct_answers' => $correctAnswers,
                'total_questions' => count($answers),
                'message' => 'Answers submitted successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to submit answers'], 500);
        }
    }

    public function getUserProgress(Request $request)
    {
        $user = $request->user();

        $progress = QuizResponse::where('user_id', $user->id)
            ->with(['question.theme.phase'])
            ->get()
            ->groupBy('question.theme.phase.id')
            ->map(function ($responses, $phaseId) {
                $phase = $responses->first()->question->theme->phase;
                $correctAnswers = $responses->where('is_correct', true)->count();
                $totalPoints = $responses->sum('points_earned');

                return [
                    'phase_id' => $phaseId,
                    'phase_name' => $phase->name,
                    'correct_answers' => $correctAnswers,
                    'total_points' => $totalPoints,
                    'total_questions_answered' => $responses->count(),
                ];
            })->values();

        return response()->json($progress);
    }

    public function resetUserProgress(Request $request)
    {
        $user = $request->user();

        DB::beginTransaction();

        try {
            QuizResponse::where('user_id', $user->id)->delete();
            UserScore::where('user_id', $user->id)->delete();
            $user->update(['points' => 0]);

            DB::commit();

            return response()->json(['message' => 'Progress reset successfully']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to reset progress'], 500);
        }
    }
}