<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ToDoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $task_detail;
    public $deadline;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($task_detail,$deadline)
    {
      $this->task_detail = $task_detail;
      $this->deadline = $deadline;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('admin.ToDoMail');
    }
}
