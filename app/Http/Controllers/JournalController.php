<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = Journal::all();
        if ($journals->isEmpty()) {
            return response()->json([
                'message' => 'No journals found'
            ], 404);
        }
        return response()->json([
            'journals' => $journals,
            'message' => 'Journals retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $journal = Journal::create($request->all());
        return response()->json([
            'journal' => $journal,
            'message' => 'Journal created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $journal = Journal::find($id);

        if (!$journal) {
            return response()->json([
                'message' => 'Journal not found'
            ], 404);
        }

        return response()->json([
            'journal' => $journal,
            'message' => 'Journal retrieved successfully'
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journal $journal)
    {
        $journal->update($request->all());
        return response()->json([
            'journal' => $journal,
            'message' => 'Journal updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {
        $journal->delete();
        return response()->json([
            'message' => 'Journal deleted successfully'
        ], 200);
    }
}
