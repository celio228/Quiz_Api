<?php

namespace App\Http\Controllers;

use App\Models\UserScore;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function getUserStats(Request $request)
    {
        $user = $request->user();

        $stats = UserScore::where('user_id', $user->id)
            ->with('phase')
            ->get()
            ->map(function ($userScore) {
                return [
                    'phase_id' => $userScore->phase_id,
                    'phase_name' => $userScore->phase->name,
                    'phase_level' => $userScore->phase->level,
                    'total_points' => $userScore->total_points,
                    'questions_answered' => $userScore->questions_answered,
                    'points_per_question' => $userScore->phase->points_per_question,
                ];
            });

        $totalPoints = $user->points;
        $totalQuestionsAnswered = $user->quizResponses()->count();

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'total_points' => $totalPoints,
                'total_questions_answered' => $totalQuestionsAnswered,
            ],
            'phase_stats' => $stats,
        ]);
    }

    public function getLeaderboard()
    {
        $leaderboard = UserScore::with(['user', 'phase'])
            ->select('user_id', 'phase_id', DB::raw('SUM(total_points) as total_points'))
            ->groupBy('user_id', 'phase_id')
            ->orderBy('total_points', 'DESC')
            ->limit(10)
            ->get()
            ->groupBy('phase_id')
            ->map(function ($scores, $phaseId) {
                return $scores->map(function ($score, $index) {
                    return [
                        'rank' => $index + 1,
                        'user_name' => $score->user->name,
                        'total_points' => $score->total_points,
                    ];
                });
            });

        return response()->json($leaderboard);
    }
}