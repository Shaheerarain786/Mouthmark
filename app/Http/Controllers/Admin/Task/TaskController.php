<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Task;
use App\User;
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
        $tasks = Task::where('is_deleted',false)->with(['filters','country_filter'])->get();
        foreach ($tasks as $task){
            $task->user = User::find($task->user_id);
        }
        return view('admin.tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status_pending($id){
        $task = Task::find($id);
        $task->status = "pending";
        $task->save();

        return back()->with("success","Status changes successfully");
    }

    public function status_completed($id){
        $task = Task::find($id);
        $task->status = "completed";
        $task->save();

        return back()->with("success","Status changes successfully");
    }

    public function status_approved($id){
        $task = Task::find($id);
        $task->status = "approved";
        $task->save();

        return back()->with("success","Status changes successfully");
    }

    public function status_discard($id){
        $task = Task::find($id);
        $task->status = "discard";
        $task->is_deleted = true;
        $task->save();

        return back()->with("success","Status changes successfully");
    }
}
