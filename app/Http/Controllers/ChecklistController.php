<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TitleChecklists;
use App\Models\Checklists;

class ChecklistController extends Controller
{
    // Tambahkan Title Kartu Admin //
    public function addTitle(Request $request)
    {
         TitleChecklists::create([
             'cards_id' => $request->card_id,
             'name' => $request->titleChecklist
         ]);

         return response()->json(['message' => 'Data berhasil disimpan!', 'card_id' => $request->card_id]);
    }
    // /Tambahkan Title Kartu Admin //

    // Tambahkan Title Kartu User //
    public function addTitle2(Request $request)
    {
         TitleChecklists::create([
             'cards_id' => $request->card_id,
             'name' => $request->titleChecklist
         ]);

         return response()->json(['message' => 'Data berhasil disimpan!', 'card_id' => $request->card_id]);
    }
    // /Tambahkan Title Kartu User //

    // Perbaharui Title Kartu Admin //
    public function updateTitle(Request $request)
    {
         TitleChecklists::where('id', $request->title_id)->update([
             'name' => $request->titleChecklistUpdate
         ]);

         return response()->json(['message' => 'Data berhasil disimpan!', 'card_id' => $request->card_id]);
    }
    // /Perbaharui Title Kartu Admin //

    // Perbaharui Title Kartu User //
    public function updateTitle2(Request $request)
    {
         TitleChecklists::where('id', $request->title_id)->update([
             'name' => $request->titleChecklistUpdate
         ]);

         return response()->json(['message' => 'Data berhasil disimpan!', 'card_id' => $request->card_id]);
    }
    // /Perbaharui Title Kartu User //

    // Hapus Judul Kartu Admin //
    public function hapusTitle(Request $request) {
        TitleChecklists::destroy($request->id);

        return response()->json(['message' => 'Data berhasil dihapus!', 'card_id' => $request->card_id]);
    }
    // /Hapus Judul Kartu Admin //

    // Hapus Judul Kartu User //
    public function hapusTitle2(Request $request) {
        TitleChecklists::destroy($request->id);

        return response()->json(['message' => 'Data berhasil dihapus!', 'card_id' => $request->card_id]);
    }
    // /Hapus Judul Kartu User //

    // Hapus Checklist Kartu Admin //
    public function hapusChecklist(Request $request) {
        Checklists::destroy($request->id);

        return response()->json(['message' => 'Data berhasil dihapus!', 'card_id' => $request->card_id]);
    }
    // /Hapus Checklist Kartu Admin //

    // Hapus Checklist Kartu Admin //
    public function hapusChecklist2(Request $request) {
        Checklists::destroy($request->id);

        return response()->json(['message' => 'Data berhasil dihapus!', 'card_id' => $request->card_id]);
    }
    // /Hapus Checklist Kartu Admin //

    // Tambahkan Checklist Admin //
    public function addChecklist(Request $request)
    {
         $data = Checklists::create([
             'title_checklists_id' => $request->title_id,
             'name' => $request->checklist
         ]);

         $checklist = Checklists::where('title_checklists_id', $request->title_id)->where('id', $data->id)->first();

         return response()->json([
            'message' => 'Data berhasil ditambahkan!',
            'checklist' => $checklist
        ]);
    }
    // /Tambahkan Checklist Admin //

    // Tambahkan Checklist User //
    public function addChecklist2(Request $request)
    {
         $data = Checklists::create([
             'title_checklists_id' => $request->title_id,
             'name' => $request->checklist
         ]);

         $checklist = Checklists::where('title_checklists_id', $request->title_id)->where('id', $data->id)->first();

         return response()->json([
            'message' => 'Data berhasil ditambahkan!',
            'checklist' => $checklist
        ]);
    }
    // /Tambahkan Checklist User //

    // Perbaharui Checklist Admin //
    public function updateChecklist(Request $request)
    {
        $is_active = $request->{$request->checklist_id} == 'on' ? 1 : 0;
        Checklists::where('id', $request->checklist_id)->update([
            'name' => $request->{'checkbox-'.$request->checklist_id},
            'is_active' => $is_active,
        ]);

        $data = Checklists::find($request->checklist_id);

         return response()->json(['message' => 'Data berhasil diperbaharui!', 'checklist' => $data]);
    }
    // /Perbaharui Checklist Admin //

    // Perbaharui Checklist Admin //
    public function updateChecklist2(Request $request)
    {
        $is_active = $request->{$request->checklist_id} == 'on' ? 1 : 0;
        Checklists::where('id', $request->checklist_id)->update([
            'name' => $request->{'checkbox-'.$request->checklist_id},
            'is_active' => $is_active,
        ]);

        $data = Checklists::find($request->checklist_id);

         return response()->json(['message' => 'Data berhasil diperbaharui!', 'checklist' => $data]);
    }
    // /Perbaharui Checklist Admin //
}
