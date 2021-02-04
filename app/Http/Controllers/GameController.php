<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\ServerStat;
use Azuriom\Models\Server;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index() {
        return view('Games.index',[
            'servers'=>Server::with('stat')->where('id','>',8)->get(),
        ]);
    }
}
