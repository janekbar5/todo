<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Priority;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $tasks = Task::with(['priorities' => function ($q){
            $q->orderBy('value', 'asc');
        }])->orderBy('created_at', 'DESC')->get();

          
  
        return view('tasks.index',compact('tasks'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priority::all();
        $users = User::all();
        return view('tasks.create',compact('priorities','users'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'priority_id' => 'required', 
            'selectedUsers' => 'required',
                      
        ]);


        $task = Task::create($request->all());

        if($request->has('selectedUsers')){
            $task->users()->sync($request->input('selectedUsers'));
        } 
   
        return redirect()->route('tasks.index')
                        ->with('success','Task created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $taks
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $priorities = Priority::all();
        $users = User::all();
        return view('tasks.edit',compact('task','priorities','users'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',  
            'priority_id' => 'required',  
            'selectedUsers' => 'required',       
        ]);
  
        $task->update($request->all());
        if($request->has('selectedUsers')){
            $task->users()->sync($request->input('selectedUsers'));
        }
  
        return redirect()->route('tasks.index')->with('success','Tasks updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();  
        return redirect()->route('tasks.index')->with('success','Task deleted successfully');
    }
}
