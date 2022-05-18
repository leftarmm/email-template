<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $u = User::all();
        //$u = User::where('name', 'Troy Bernier')->get()->toArray();
        //$u = DB::table('users')->where('id', 5)->get()->toArray();
        //dd($u);


        return view('welcome', [
            'users' => $u
        ]);    
    }
}
