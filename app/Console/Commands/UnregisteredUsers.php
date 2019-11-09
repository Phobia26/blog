<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;



use App\Mail\ToDoMail;

use App\Task;
use App\User;

class UnregisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
     //protected $description = 'Command description';
     protected $description = 'Send an email of registered users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $tasks = DB::table('tasks')->where('deadline', '>=', date("Y-m-d"))->where('status','=',"Pending")->get();

      foreach ($tasks as $task) {
        // code...
        $emp_id = $task->employee_id;
        $emp_mail = DB::table('users')->where('id', $emp_id)->value('email');
        $task_detail = $task->task;
        $deadline = $task->deadline;
        Mail::to($emp_mail)->send(new ToDoMail($task_detail,$deadline));
    }
  }
}
