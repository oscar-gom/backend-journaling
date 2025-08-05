<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use Illuminate\Http\Request;

class DailyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = DailyTask::all();
        return response()->json([
            'tasks' => $tasks,
            'message' => 'Daily tasks retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $task = DailyTask::create($request->all());
            return response()->json([
                'task' => $task,
                'message' => 'Daily task created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create daily task',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = DailyTask::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Daily task not found'
            ], 404);
        }

        return response()->json([
            'task' => $task,
            'message' => 'Daily task retrieved successfully'
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyTask $dailyTask)
    {
        try {
            $dailyTask->update($request->all());
            return response()->json([
                'task' => $dailyTask,
                'message' => 'Daily task updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update daily task',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyTask $dailyTask)
    {
        try {
            $dailyTask->delete();
            return response()->json([
                'message' => 'Daily task deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete daily task',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
