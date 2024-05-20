<?php

namespace App\Http\Controllers;

use App\Models\Checklists;
use App\Models\TitleChecklists;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function addTitle(Request $request)
    {
         TitleChecklists::create([
             'cards_id' => $request->card_id,
             'name' => $request->titleChecklist
         ]);
 
         return response()->json(['message' => 'Data saved successfully!', 'card_id' => $request->card_id]);
    }

    public function updateTitle(Request $request)
    {
         TitleChecklists::where('id', $request->title_id)->update([
             'name' => $request->titleChecklistUpdate
         ]);
 
         return response()->json(['message' => 'Data saved successfully!', 'card_id' => $request->card_id]);
    }

    public function addChecklist(Request $request)
    {
         $data = Checklists::create([
             'title_checklists_id' => $request->title_id,
             'name' => $request->checklist
         ]);

         $checklist = Checklists::where('title_checklists_id', $request->title_id)->where('id', $data->id)->first();
 
         return response()->json([
            'message' => 'Data saved successfully!',
            'checklist' => $checklist
        ]);
    }

    public function updateChecklist(Request $request)
    {
        $is_active = $request->{$request->checklist_id} == 'on' ? 1 : 0;
        Checklists::where('id', $request->checklist_id)->update([
            'name' => $request->{'checkbox-'.$request->checklist_id},
            'is_active' => $is_active,
        ]);

        $data = Checklists::find($request->checklist_id);
 
         return response()->json(['message' => 'Data saved successfully!', 'checklist' => $data]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
