<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habits = Habit::all();
        if ($habits->isEmpty()) {
            return response()->json([
                'message' => 'No habits found'
            ], 404);
        }
        return response()->json([
            'habits' => $habits,
            'message' => 'Habits retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $habit = Habit::create($request->all());
        return response()->json([
            'habit' => $habit,
            'message' => 'Habit created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habit = Habit::find($id);

        if (!$habit) {
            return response()->json([
                'message' => 'Habit not found'
            ], 404);
        }

        return response()->json([
            'habit' => $habit,
            'message' => 'Habit retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habit $habit)
    {
        $habit->update($request->all());
        return response()->json([
            'habit' => $habit,
            'message' => 'Habit updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $habit->delete();
        return response()->json([
            'message' => 'Habit deleted successfully'
        ], 200);
    }
}
