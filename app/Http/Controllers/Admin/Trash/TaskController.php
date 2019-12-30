<?php

namespace App\Http\Controllers\Admin\Trash;

use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::where('is_deleted',true)->with(['filters','country_filter'])->get();
        foreach ($tasks as $task){
            $task->user = User::find($task->user_id);
        }
        return view('admin.trash.tasks.index',compact('tasks'));
    }
    public function recycle($id){

        $task = Task::find($id);
        $task->is_deleted = false;
        $task->save();

        return back()->with("success","Recoverd Successfully");
    }

    public function delete($id){

        $task = Task::find($id);
        $task->delete();

        return back()->with("success","deleted successfully");
    }
}
