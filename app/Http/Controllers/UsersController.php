<?php

namespace App\Http\Controllers;

use Session;

use App\User;

use App\Profile;

use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
       $this->middleware('admin');
     }


    public function index()
    {

      $user = User::where('admin',0)->orderBy('id')->paginate(10);
        return view('admin.users.index')->with('users', $user );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'first_name' => 'required',
          'last_name' => 'required',
          'email' =>'required|email'
        ]);



        $user = User::create([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'password' =>bcrypt('password')
        ]);



        Session::flash('success', 'Employee added successfully.');

        return redirect()->route('users');

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
      $user = User::find($id);




        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'first_name' => 'required',
          'last_name' => 'required',
          'email' =>'required'

        ]);


        $user = User::find($id);

        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email = $request->email;

        $user->save();

        Session::flash('success','Employee details updated.');

        return redirect()->route('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success','Employee profile deleted.!');

        return redirect()->back();
    }

    public function admin($id)
    {
      $user = User::find($id);

      $user->admin =1;

      $user->save();

      Session::flash('success', 'Successfully changed user Permissions.');

      return redirect()->back();
    }

    public function not_admin($id)
    {
      $user = User::find($id);

      $user->admin =0;

      $user->save();

      Session::flash('success', 'Successfully changed user Permissions.');

      return redirect()->back();
    }
}
