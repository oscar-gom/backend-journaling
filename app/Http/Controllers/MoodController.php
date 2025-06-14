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
        Mood::create($request->all());
        return response()->json([
            'message' => 'Mood created successfully'
        ], 201);
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
        $mood->update($request->all());
        return response()->json([
            'mood' => $mood,
            'message' => 'Mood updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mood $mood)
    {
        $mood->delete();
        return response()->json([
            'message' => 'Mood deleted successfully'
        ], 200);
    }
}
