<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Http\Resources\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadersController extends Controller
{
    //
    public function index(){
        $stats = DB::table('lhrv_statistics')->get();
        $leaders = DB::table('default_lhrv_alltime')
                   ->join('lhrv_players', 'default_lhrv_alltime.player_id', '=', 'lhrv_players.player_id')
                   ->join('lhrv_statistics', 'default_lhrv_alltime.stat_id', '=', 'lhrv_statistics.stat_id')
                   ->select('default_lhrv_alltime.*', 'lhrv_players.name', 'lhrv_statistics.real_name')
                   ->get();
        $sorted = $leaders->sortByDesc('stat_value');
        return view('profile.leaders', [
            'kills' => $sorted->where('stat_id', '=', 1)->take(100),
            'playedhours' => $sorted->where('stat_id', '=', 2)->take(100),
            'blockmines' => $sorted->where('stat_id', '=', 4)->take(100),
            'moneys' => $sorted->where('stat_id', '=', 6)->take(100),
            'stats' => $stats,
        ]);
    }
}
