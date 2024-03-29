    @extends('layouts.app')    

    @section('content')

    <section class="content-header">
      <h1>
        Tasks

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tasks</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Task</h3>
            </div>
            @include('admin.includes.errors')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                 <label for="employee_id">Select Employee</label>
                <select class="form-control" id="employee_id" name="employee_id">
                  @foreach($employees as $employee)

                    <option value="{{ $employee->id }}" >{{ $employee->first_name}} {{ $employee->last_name}}</option>

                  @endforeach

                </select>
              </div>
                <div class="form-group">
                  <label for="task">Task</label>
                  <input type="text" id="task" name="task" class="form-control" value="{{old('task')}}" placeholder="Enter Task">
                </div>
                <div class="form-group">

                    <div class="form-group">
                      <label for="deadline">Deadline</label>
                      <input type="date" id="deadline" name="deadline" class="form-control" value="{{old('deadline')}}" placeholder="Choose Deadline Date">
                    </div>
                    <div class="form-group">
                 <label for="status">Status</label>
                <select class="form-control" id="status" name="status">

                    <option value="Pending" >Pending</option>
                    <option value="Completed" >Completed</option>

                </select>
              </div>

              </div>
            </div>


             </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary btn-md ">Create Task</button>
              </div>
            </form>

          <!-- /.box -->
        </div>
      </div>
    </div>
    </section>

    @endsection                                                                                                                                                                  
