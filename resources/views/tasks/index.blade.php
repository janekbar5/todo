@extends('tasks.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th> 
            <th>Priority</th>
            <th>User</th>  
            <th>Created At</th>        
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->priorities->description }}</td>
            <td>
                 @foreach ($task->users as $user)
                 {{ $user->name }}
                 @endforeach
            </td>
             <td>{{ $task->created_at }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">      
                    <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
  
      
@endsection