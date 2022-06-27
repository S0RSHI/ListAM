<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SingleAM extends Controller
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

    public function index( $id ){
        $anime_manga = DB::table('anime_manga')->where('id_am', '=', $id)->get();
        return view('single', compact('anime_manga'));
    }
}
