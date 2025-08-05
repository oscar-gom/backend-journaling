<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mood = Mood::all();
        return response()->json([
            'moods' => $mood,
            'message' => 'Moods retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $mood = Mood::create($request->all());
            return response()->json([
                'mood' => $mood,
                'message' => 'Mood created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create mood',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mood = Mood::find($id);

        if (!$mood) {
            return response()->json([
                'message' => 'Mood not found'
            ], 404);
        }

        return response()->json([
            'mood' => $mood,
            'message' => 'Mood retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mood $mood)
    {
        try {
            $mood->update($request->all());
            return response()->json([
                'mood' => $mood,
                'message' => 'Mood updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update mood',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mood $mood)
    {
        try {
            $mood->delete();
            return response()->json([
                'message' => 'Mood deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete mood',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
