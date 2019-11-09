<?php

namespace App\Http\Controllers;

use Session;

use Auth;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
          'first_name' =>'required',
          'last_name' => 'required',
          'email' => 'required|email'

        ]);

        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
          $avatar = $request->avatar;

          $avatar_new_name = time(). $avatar->getClientOriginalName();

          $avatar->move('uploads/avatars', $avatar_new_name);

          $user->profile->avatar = 'uploads/avatars/'.$avatar_new_name;
          $user->avatar = 'uploads/avatars/'.$avatar_new_name;
          $user->save();
          $user->profile->save();
        }

        $user->first_name = $request->first_name;

        $user->last_name = $request->last_name;

        $user->email = $request->email;

        if($request->has('password'))
        {
          $user->password = bcrypt($request->password);
        }


        $user->save();
        $user->profile->save();



        Session::flash('success','Account Profile updated.');

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
