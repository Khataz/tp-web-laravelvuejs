<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Events\TaskCreated;
use App\Events\TaskRemoved;
use App\Events\TaskProgressed;
use App\Task;

class TaskController extends Controller
{
    //
    public function fetchAll(){
        $tasks = Task::all();
        //return response()->json($tasks);
        return $tasks;
    }

    public function store(Request $request){
        $task = Task::create($request->all());
        broadcast(new TaskCreated($task));
        return response()->json("added");
    }

    public function delete($id){
        $task = Task::find($id);
        broadcast(new TaskRemoved($task));
        Task::destroy($id);
        return response()->json("deleted");
    }

    public function progress($id){
        $task = Task::find($id);
        $task->progressed = true;
        $task->save();
        broadcast(new TaskProgressed($task));
        return response()->json("progressed");
    }
}