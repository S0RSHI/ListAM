<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
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
    public function index()
    {
       $anime_manga = DB::table('anime_manga')->get();
        return view('home', compact('anime_manga'));
    }

    public function test( $id ){
        $anime_manga = DB::table('anime_manga')->where('id_am', '=', $id)->get();
        return view('home', compact('anime_manga'));
    }
}
