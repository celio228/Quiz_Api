<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($themeId)
    {
        $questions = Question::where('theme_id', $themeId)
            ->with('options')
            ->get();

        return response()->json($questions);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'question_text' => 'required|string',
            'question_type' => 'required|string',
            'points' => 'required|integer',
            'options' => 'required|array|min:2',
            'options.*.option_text' => 'required|string',
            'options.*.is_correct' => 'required|boolean',
        ]);

        $question = Question::create($validated);

        foreach ($validated['options'] as $optionData) {
            Option::create([
                'question_id' => $question->id,
                'option_text' => $optionData['option_text'],
                'is_correct' => $optionData['is_correct'],
            ]);
        }

        return response()->json($question->load('options'), 201);
    }

    public function update(Request $request, $id)
    {
        $question = Question::find($id);

        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        $validated = $request->validate([
            'question_text' => 'sometimes|required|string',
            'points' => 'sometimes|required|integer',
        ]);

        $question->update($validated);

        return response()->json($question->load('options'));
    }

    public function destroy($id)
    {
        $question = Question::find($id);

        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        $question->delete();

        return response()->json(['message' => 'Question deleted successfully']);
    }
}