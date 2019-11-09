@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1>
    Employees

  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Employees</li>
  </ol>
</section>


<section class="content">
<div class="row">
   <div class="col-xs-12">
     <div class="box box-primary">
       <div class="box-header">
         <h3 class="box-title">Employees</h3>


       </div>
       <!-- /.box-header -->
       <div class="box-body table-responsive ">
         <table id="example1" class="table table-bordered table-striped">
           <thead>
           <tr>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Edit</th>
             <th>Delete</th>
           </tr>
          </thead>
          <tbody>
           @if($users->count() > 0)

           @foreach($users as $user)

           <tr>

             <td>{{ $user->first_name }}</td>
             <td>{{ $user->last_name }}</td>
             <td><a href="{{ route('user.edit',['id'=> $user->id]) }}"><span class="label label-success"><i class="glyphicon glyphicon-pencil"></i></span></a></td>
             <td><a href="{{ route('user.delete',['id'=> $user->id]) }}"><span class="label label-danger"><i class="glyphicon glyphicon-trash"></i></span></a></td>
           </tr>

          @endforeach

          @else

          <tr>

            <th colspan="5" class="text-center">No Employee added yet</th>

          </tr>

          @endif
        </tbody>
         </table>
         {{$users->links()}}
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </div>
 </div>
</section>


@endsection()
