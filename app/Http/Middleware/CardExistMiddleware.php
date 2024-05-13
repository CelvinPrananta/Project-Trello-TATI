<?php

namespace App\Http\Middleware;

use App\Models\Card;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Brian2694\Toastr\Facades\Toastr;

class CardExistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $card_id = intval($request->route('card_id'));
        $board_id = intval($request->route('board_id'));
        $team_id = intval($request->route('team_id'));

        $card = Card::find($card_id);

        if (!$card)

            Toastr::error('Kartu tidak ditemukan atau terhapus harap menghubungi pemiliknya', 'Error');
            return redirect()->route("board", ["team_id" => $team_id, "board_id" => $board_id]);

        return $next($request);
    }
}