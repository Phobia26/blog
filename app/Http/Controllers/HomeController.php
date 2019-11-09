<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *

     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function adminmail($id)
    {

      	$user = \App\User::find($id);

          Mail::to($user->email)->send(new \App\Mail\ToDoMail($user));

          Session::flash('success', 'Notification Sent Successfully.');

          return redirect()->route('tasks');

    }
}
