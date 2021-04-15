<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SuperController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superA']);
    }


    public function index()
    {
    	$users = User::all();
        return view('users.index',['users' => $users]);
    }

/*     public function index2()
    {
    	  $users = User::all();
        return view('admin.index',['users' => $users]);
    }*/

    
}
