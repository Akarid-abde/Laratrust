<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Hash;


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

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    
        public function store(Request $request)
    {
     
        $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->attachRole('admin');
        /*return $user;
*/
        session()->flash('success','Admin est bien criér !!');
        return redirect('super');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cv.show',['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cv = Cv::find($id);

        // Policy
        $this->authorize('update', $cv);

        return view('cv.edite',['cv' => $cv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function update(CvRequest $request,$id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
     /*    unlink(public_path('storage\'.$cv->photo));*/
        /*Storage::delete($cv->photo);*/
        $user->delete();
        session()->flash('delete','la supprission est bien fait');
        return redirect('super');
    }


    
}
