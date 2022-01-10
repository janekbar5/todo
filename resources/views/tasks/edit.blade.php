@extends('tasks.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('tasks.update',$task->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $task->name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="row">
                 <div class="form-group">                                              
                        <select name="priority_id" class="form-control" >
                            <option value="">Any priority</option> 
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->value }}" @if($priority->value == $task->priority_id ) selected  @endif> {{ $priority->description }}</option>
                            @endforeach 
                 </div>  
            </div>  

            <div class="row">                        
                        <label>Users</label></br>
                        @foreach ($users->chunk(4) as $chunk2)
                        <div class="col-md-3">
                            <div class="form-group">
                                @foreach ($chunk2 as $usr)
                                <label>
                                    <input type="checkbox" class="flat-red" name="selectedUsers[]" value="{{ $usr->id }}" @foreach($task->users as $i) @if($usr->id == $i->id) checked @endif @endforeach>
                                           {{ $usr->name }} 
                                </label><br>
                                @endforeach
                            </div>
                        </div>
                        @endforeach 
                        
             </div> 
            
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection