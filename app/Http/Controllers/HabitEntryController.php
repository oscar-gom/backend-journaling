<?php

namespace App\Http\Controllers;

use App\Models\HabitEntry;
use Illuminate\Http\Request;

class HabitEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = HabitEntry::all();
        return response()->json([
            'entries' => $entries,
            'message' => 'Habit entries retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $entry = HabitEntry::create($request->all());
            return response()->json([
                'entry' => $entry,
                'message' => 'Habit entry created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create habit entry',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $entry = HabitEntry::find($id);

        if (!$entry) {
            return response()->json([
                'message' => 'Habit entry not found'
            ], 404);
        }

        return response()->json([
            'entry' => $entry,
            'message' => 'Habit entry retrieved successfully'
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HabitEntry $habitEntry)
    {
        try {
            $habitEntry->update($request->all());
            return response()->json([
                'entry' => $habitEntry,
                'message' => 'Habit entry updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update habit entry',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HabitEntry $habitEntry)
    {
        try {
            $habitEntry->delete();
            return response()->json([
                'message' => 'Habit entry deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete habit entry',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
