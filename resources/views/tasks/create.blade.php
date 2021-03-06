@extends('tasks.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Task</h2>
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
   
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>

            

             <div class="form-group">
                 <label class="white">Priority</label>                                              
                        <select name="priority_id" class="form-control" >
                            <option value="">Any priority</option> 
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->value }}" > {{ $priority->description }}</option>
                            @endforeach 
                 </select>  
            </div>         

            <!-- <div class="form-group">
                 <label class="white">Users</label>                                              
                    <select multiple="multiple" name="selectedUsers[]" class="form-control" >                         
                            @foreach ($users as $user)
                           <option value="{{ $user->id }}" > {{ $user->name }}</option>
                           @endforeach 
                    </select>  
            </div>  -->


            <div class="form-group mb-3">
              <label for="select2Multiple">Multiple Tags</label>
              <select class="select2-multiple form-control" name="selectedUsers[]" multiple="multiple" id="select2Multiple">
                 @foreach ($users as $user)
                <option value="{{ $user->id }}" > {{ $user->name }}</option>
                 @endforeach                
              </select>
            </div>

           
            


            
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>




       
      <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });

    </script>

@endsection