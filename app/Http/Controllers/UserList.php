<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UserList extends Controller
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

    public function add_to_list(request $request){
        $id_user = Auth::id();
        if(DB::table('user_list')->where('id_user', '=', $id_user)->first() === null){
            DB::table('user_list')->insert(
                array(
                    'id_am' => $request -> input('id_am'),
                    'id_user' => $id_user,
                    'status' => $request -> input('status'),
                    'progress' => $request -> input('progress'),
                    'rate' => $request -> input('rate')
                )
            );
            return json_encode('git');
        } else {
            return json_encode('nie git');
        }
    }
}
