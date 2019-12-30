<?php

namespace App\Http\Controllers\API\Advertiser;

use App\CountryFilter;
use App\Filters;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function create_task(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'advertiser_id' => 'required',
            'task_title' => 'required',
            'task_description' => 'required',
            'influencer_required' => 'required',
            'task_image' => 'required',
            'filter_applied' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        } else {
            $task = new Task();
            $task->user_id = $request->advertiser_id;
            $task->title = $request->task_title;
            $task->user_required = $request->influencer_required;
            $task->description = $request->task_description;
//            $task->task_image = $request->task_image;
            $task->status = Config::get("constants.CONSTANTS.PENDING");
            $task->filter_applied = $request->filter_applied;
            if ($request->hasFile('task_image')) {
                $file = $request->file('task_image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '', $filename);
                $picture = date('His') . $filename;
                $destinationPath = public_path() . '/images/uploads';
                $file->move($destinationPath, $picture);
                $filePath = url('/images/uploads') . '/' . $picture;
                $task->task_image = $filePath;
            }
            $task->save();

            if ($request->filter_applied == 1) {
                $filter_applied = new Filters();
                $filter_applied->task_id = $task->id;
                $filter_applied->gender = $request->gender ? $request->gender : null;
                $filter_applied->max_age = $request->max_age ? $request->max_age : null;
                $filter_applied->min_age = $request->min_age ? $request->min_age : null;
                $filter_applied->country_applied = $request->country_applied;
                $filter_applied->save();
            }
            if($request->country_applied == 1) {
                $arr = json_decode($request->country_list);
                if ($arr) {
                    foreach ($arr as $key => $value) {
                        $country = new CountryFilter();
                        $country->country = $value->country_name;
                        $country->task_id = $task->id;
                        $country->country_id = $value->country_id;
                        $country->country_code = $value->country_code;
                        $country->save();
                    }
                }
            }

            return response()->json([
                "status" => true,
                "mesage" => "Task Created Successfully",
                "task_status" => "Pending"
            ]);
        }
    }

    public function apply_filters()
    {

    }
    public function all(){
        $tasks =$tasks = Task::with(['filters','country_filter'])->get();
        foreach ($tasks as $task){
            $task->user = User::find($task->uid);
        }
        return response()->json([
           'status' => true,
           'message' => "success",
           'data' => $tasks
        ]);
    }
}
