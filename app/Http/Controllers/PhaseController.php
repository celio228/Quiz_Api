<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    public function index()
    {
        $phases = Phase::with(['themes' => function($query) {
            $query->orderBy('order');
        }])->orderBy('order')->get();

        return response()->json($phases);
    }

    public function show($id)
    {
        $phase = Phase::with(['themes.questions.options'])->find($id);

        if (!$phase) {
            return response()->json(['message' => 'Phase not found'], 404);
        }

        return response()->json($phase);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|string',
            'points_per_question' => 'required|integer',
            'order' => 'required|integer',
        ]);

        $phase = Phase::create($validated);

        return response()->json([$phase], 201);
    }

    public function update(Request $request, $id)
    {
        $phase = Phase::find($id);

        if (!$phase) {
            return response()->json(['message' => 'Phase not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'level' => 'sometimes|required|string',
            'points_per_question' => 'sometimes|required|integer',
            'order' => 'sometimes|required|integer',
        ]);

        $phase->update($validated);

        return response()->json($phase);
    }

    public function destroy($id)
    {
        $phase = Phase::find($id);

        if (!$phase) {
            return response()->json(['message' => 'Phase not found'], 404);
        }

        $phase->delete();

        return response()->json(['message' => 'Phase deleted successfully']);
    }
}