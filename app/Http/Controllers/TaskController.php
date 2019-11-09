<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use Session;

use App\User;

class TaskController extends Controller
{
  public function index()
  {
    $employee = User::all();
    $employee = User::all();
    $task = Task::orderBy('id')->paginate(10);
      return view('admin.tasks.index')->with('tasks', $task )->with('employees',$employee);
  }

  public function emp($id)
  {
    $employee = User::all();
    $task = Task::where('employee_id',$id)->orderBy('id')->paginate(10);
      return view('admin.tasks.employee_index')->with('tasks', $task )->with('employees',$employee);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $employee = User::all();
      return view('admin.tasks.create')->with('employees',$employee);

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
        'task' => 'required',
        'employee_id' => 'required'
      ]);



      $task = Task::create([
        'task' => $request->task,
        'status' => $request->status,
        'employee_id' => $request->employee_id,
        'deadline' => $request->deadline
      ]);



      Session::flash('success', 'Task added successfully.');

      return redirect()->route('tasks');

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
    $task = Task::find($id);

    $employee = User::all();


      return view('admin.tasks.edit')->with('task',$task)->with('employees',$employee);
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
        'task' => 'required',
        'employee_id' => 'required'
      ]);


      $task = Task::find($id);

      $task->task=$request->task;
      $task->status=$request->status;
      $task->employee_id = $request->employee_id;
      $task->deadline = $request->deadline;

      $task->save();

      Session::flash('success','Task details updated.');

      return redirect()->route('tasks');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $task = Task::find($id);

      $task->delete();

      Session::flash('success','Task deleted!');

      return redirect()->back();
  }
}
