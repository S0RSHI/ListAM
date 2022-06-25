<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListAM extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function list_anime(){
        $anime_manga = DB::table('anime_manga')->get();
        return view('animeList', compact('anime_manga'));
    }

    public function list_manga(){
        $anime_manga = DB::table('anime_manga')->get();
        return view('mangaList', compact('anime_manga'));
    }
}
