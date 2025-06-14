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
        DailyTask::create($request->all());
        return response()->json([
            'task' => $request,
            'message' => 'Daily task created successfully'
        ], 201);
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
        $dailyTask->update($request->all());
        return response()->json([
            'task' => $dailyTask,
            'message' => 'Daily task updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyTask $dailyTask)
    {
        $dailyTask->delete();
        return response()->json([
            'message' => 'Daily task deleted successfully'
        ], 200);
    }
}
