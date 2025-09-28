<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index($phaseId)
    {
        $themes = Theme::where('phase_id', $phaseId)
            ->with(['questions.options'])
            ->orderBy('order')
            ->get();

        return response()->json($themes);
    }

    public function show($id)
    {
        $theme = Theme::with(['questions.options'])->find($id);

        if (!$theme) {
            return response()->json(['message' => 'Theme not found'], 404);
        }

        return response()->json($theme);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'phase_id' => 'required|exists:phases,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        $theme = Theme::create($validated);

        return response()->json($theme, 201);
    }

    public function update(Request $request, $id)
    {
        $theme = Theme::find($id);

        if (!$theme) {
            return response()->json(['message' => 'Theme not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'order' => 'sometimes|required|integer',
        ]);

        $theme->update($validated);

        return response()->json($theme);
    }

    public function destroy($id)
    {
        $theme = Theme::find($id);

        if (!$theme) {
            return response()->json(['message' => 'Theme not found'], 404);
        }

        $theme->delete();

        return response()->json(['message' => 'Theme deleted successfully']);
    }
}