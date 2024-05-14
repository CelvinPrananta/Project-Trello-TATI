<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\BoardLogic;
use App\Logic\CardLogic;
use App\Logic\TeamLogic;
use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\Team;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class BoardController extends Controller
{
    public function __construct(
        protected TeamLogic $teamLogic,
        protected BoardLogic $boardLogic,
        protected CardLogic $cardLogic
    ) {
    }

    // Membuat Papan Khusus Admin //
    public function createBoard(Request $request, $team_id)
    {
        $request->validate([
            "team_id"       => "required",
            "board_name"    => "required",
            "board_pattern" => "required"
        ]);
        $team_id = intval($request->team_id);

        $createdBoard = $this->boardLogic->createBoard(
            $team_id,
            $request->board_name,
            $request->board_pattern,
        );

        if ($createdBoard == null)

            Toastr::error('Gagal membuat papan, silahkan coba lagi!', 'Error');
            return redirect()->back();

        Toastr::success('Papan berhasil dibuat!', 'Success');
        return redirect()->back();
    }
    // /Membuat Papan Khusus Admin //

    // Membuat Kolom Admin & User //
    public function addColumn(Request $request, $team_id, $board_id,)
    {
        $request->validate([
            "board_id"      => "required",
            "column_name"   => "required",
        ]);
        $team_id = intval($team_id);
        $board_id = intval($request->board_id);

        $createdColumn = $this->boardLogic->addColumn($board_id, $request->column_name);

        if ($createdColumn == null)

            Toastr::error('Gagal membuat kolom, silahkan coba lagi!', 'Error');
            return redirect()->back();

        return response()->json($createdColumn);
    }
    // /Membuat Kolom Admin & User //

    // Tampilan Papan Admin //
    public function showBoard($team_id, $board_id)
    {
        $board_id = intval($board_id);
        $board = $this->boardLogic->getData($board_id);
        $team = Team::find($board->team_id);
        $teamOwner = $this->teamLogic->getTeamOwner($board->team_id);

        return view("admin.board")
            ->with("team", $team)
            ->with("owner", $teamOwner)
            ->with("board", $board)
            ->with("patterns", BoardLogic::PATTERN);
    }
    // /Tampilan Papan Admin //

    // Tampilan Papan User //
    public function showBoard2($team_id, $board_id)
    {
        $board_id = intval($board_id);
        $board = $this->boardLogic->getData($board_id);
        $team = Team::find($board->team_id);
        $teamOwner = $this->teamLogic->getTeamOwner($board->team_id);

        return view("user.board")
            ->with("team", $team)
            ->with("owner", $teamOwner)
            ->with("board", $board)
            ->with("patterns", BoardLogic::PATTERN);
    }
    // /Tampilan Papan User //

    // Perbaharui Papan Khusus Admin //
    public function updateBoard(Request $request)
    {
        $request->validate([
            "board_id"      => "required",
            "board_name"    => "required",
            "board_pattern" => "required",
        ]);

        $board = Board::find(intval($request->board_id));
        $board->name = $request->board_name;
        $board->pattern = $request->board_pattern;
        $board->save();

        Toastr::success('Papan berhasil diperbarui!', 'Success');
        return redirect()->back();
    }
    // /Perbaharui Papan Khusus Admin //

    // Membuat Kartu Admin & User //
    public function addCard(Request $request, $team_id, $board_id, $column_id)
    {
        $board_id = intval($board_id);
        $column_id = intval($column_id);
        $card_name = $request->name;

        $newCard = $this->boardLogic->addCard($column_id, $card_name);
        $this->cardLogic->cardAddEvent($newCard->id, Auth::user()->id, "Membuat Kartu");
        return response()->json($newCard);
    }
    // /Membuat Kartu Admin & User //

    // Mendapatkan Data Admin & User //
    public function getData($team_id, $board_id)
    {
        $boardData = $this->boardLogic->getData(intval($board_id));
        return response()->json($boardData);
    }
    // /Mendapatkan Data Admin & User //

    // Memindahkan Kartu Admin & User //
    public function reorderCard(Request $request, $team_id, $board_id)
    {
        $board_id = intval($board_id);
        $column_id = intval($request->column_id);
        $middle_id = intval($request->middle_id);
        $bottom_id = intval($request->bottom_id);
        $top_id = intval($request->top_id);

        $updatedCard = $this->boardLogic->moveCard($middle_id, $column_id, $bottom_id, $top_id);

        return response()->json($updatedCard);
    }
    // /Memindahkan Kartu Admin & User //

    // Memindahkan Kolom Admin //
    public function reorderCol(Request $request, $team_id, $board_id)
    {
        $user_id = Auth::user()->id;
        $board_id = intval($board_id);
        $middle_id = intval($request->middle_id);
        $right_id = intval($request->right_id);
        $left_id = intval($request->left_id);

        if (!$this->boardLogic->hasAccess($user_id, $board_id)) {
            return response()->json(["url" => route("showTeams")], HttpResponse::HTTP_BAD_REQUEST);
        }

        $updatedCol = $this->boardLogic->moveCol($middle_id, $right_id, $left_id);
        return response()->json($updatedCol);
    }
    // /Memindahkan Kolom Admin //

    // Memindahkan Kolom User //
    public function reorderCol2(Request $request, $team_id, $board_id)
    {
        $user_id = Auth::user()->id;
        $board_id = intval($board_id);
        $middle_id = intval($request->middle_id);
        $right_id = intval($request->right_id);
        $left_id = intval($request->left_id);

        if (!$this->boardLogic->hasAccess($user_id, $board_id)) {
            return response()->json(["url" => route("showTeams2")], HttpResponse::HTTP_BAD_REQUEST);
        }

        $updatedCol = $this->boardLogic->moveCol($middle_id, $right_id, $left_id);
        return response()->json($updatedCol);
    }
    // /Memindahkan Kolom User //

    // Hapus Papan Admin //
    public function deleteBoard($team_id, $board_id)
    {
        Board::where("id", intval($board_id))->delete();

        Toastr::success('Papan berhasil dihapus!', 'Success');
        return redirect()->route("viewTeam", ["team_id" => intval($team_id)]);
    }
    // /Hapus Papan Admin //

    // Hapus Papan User //
    public function deleteBoard2($team_id, $board_id)
    {
        Board::where("id", intval($board_id))->delete();

        Toastr::success('Papan berhasil dihapus!', 'Success');
        return redirect()->route("viewTeam2", ["team_id" => intval($team_id)]);
    }
    // /Hapus Papan User //

    // Perbaharui Kolom Admin & User //
    public function updateCol(Request $request, $team_id, $board_id)
    {
        $request->validate([
            "column_name"   => "required|max:20",
            "column_id"     => "required",
        ]);

        $col_id = intval($request->column_id);
        $column = Column::find($col_id);

        if (!$column) {
            Toastr::error('Kolom tidak ditemukan atau terhapus harap menghubungi pemiliknya', 'Error');
            return redirect()->back();
        }

        $column->name = $request->column_name;
        $column->save();

        Toastr::success('Kolom berhasil diperbaharui!', 'Success');
        return redirect()->back();
    }
    // /Perbaharui Kolom Admin & User //

    // Menghapus Kolom Admin & User //
    public function deleteCol(Request $request, $team_id, $board_id)
    {
        $request->validate(["column_id" => "required"]);
        $col_id = intval($request->column_id);
        $this->boardLogic->deleteCol($col_id);

        Toastr::success('Kolom berhasil dihapus!', 'Success');
        return redirect()->back();
    }
    // /Menghapus Kolom Admin & User //
}