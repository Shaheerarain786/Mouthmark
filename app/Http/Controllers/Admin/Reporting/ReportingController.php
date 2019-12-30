<?php

namespace App\Http\Controllers\Admin\Reporting;

use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class ReportingController extends Controller
{
    public function index(){
        return view('admin.reporting.index');
    }

    public function ajax_get_tasks(Request $request){
        $user = User::where('type',$request->type)->get();
        return $user;

    }

    public function show_reporting_table(Request $request){

        $tasks = Task::where('user_id',$request->user_id)->with(['filters','country_filter'])->get();
        foreach ($tasks as $task){
            $task->user = User::where('id',$request->user_id)->where('type',$request->user_type)->first();
        }
        return view('admin.reporting.index',compact('tasks'));
    }
}
