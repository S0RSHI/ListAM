<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AddToList extends Controller
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

    public static function add_to_list($id_am, $status, $progress, $ocena){
        $id_user = Auth::id();
        if(DB::table('user_list')->where('id_user', '=', $id_user)->first() === null){
            DB::table('user_list')->insert(
                array('id_am' => $id_am, 'id_user' => $id_user, 'status' => $status, 'progress' => $progress, 'rate' => $ocena)
            );
            return '<script> console.log("git")</script>';
        } else {
            return '<script> console.log("nie git")</script>';
        }
    }
}
