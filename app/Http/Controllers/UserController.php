<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

	  public function __construct()
    {
        /*$this->middleware(['role:admin']);*/
        $this->middleware(['role:admin|superA']);
    }


     public function dashbord()
    {
        $users = User::all();
        return view('dashbord',['users' => $users]);
        /*return view('users.index',compact('users'));*/
    }

	    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$users = User::all();
        return view('users.index',['users' => $users]);
        /*return view('users.index',compact('users'));*/
    }




    public function edit(User $user)
    {
         return view('users.edite',compact('user'));
    }

     public function update(Request $request,User $user)
    {

    	$request->validate([
    		'name' => 'required',
    		'roles' => 'required|array|min:1'

    	]);

    	$requestData = $request->except('email');
    	$user->update($requestData);

    	$user->syncRoles($request->roles);
    	return redirect()->route('users.index');
    }
  


}
