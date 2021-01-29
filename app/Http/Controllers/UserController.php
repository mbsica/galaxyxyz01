<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Http\Resources\User as UserResource;
use Azuriom\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Find the users with the specified name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function search(Request $request)
    {
        $name = $request->input('q');

        $users = User::search($name, 'name')->with('role')->get();

        return UserResource::collection($users);
    }
    public function playerList() {
        $players = User::orderby('last_login_at','desc')->paginate();
        $playersAll = User::orderby('last_login_at','desc')->get();

        return view('profile.list',[
            'players'=>$players,
            'playersAll'=>$playersAll,
        ]);
    }
    public function staffList() {
        $players = User::orderby('last_login_at','desc')->get();
        $owners = User::where('role_id',2)->get();
        $developers = User::where('role_id',3)->get();
        $srmods = User::where('role_id',4)->get();
        $mods = User::where('role_id',5)->get();

        return view('profile.staff',[
            'players'=>$players,
            'owners'=>$owners,
            'developers'=>$developers,
            'srmods'=>$srmods,
            'mods'=>$mods,
        ]);
    }
    public function leaderBoard() {

        return view('profile.leaders');
    }
}
