<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\task;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class TaskController extends Controller
{
    public function store(Request $request)
    {
    $this->validate($request, [
    'name' => 'required',
    'deadline' => 'required',
    'dep_name' => 'required',
   
    ]);
    $input = $request->all();
    
     task::create($input);
    
    return response()->json('task created successfully');
    }


    public function show(Request $request)
{
$id=$request->id;
$task = task::find($id);
return response()->json($task);
}


public function show_dep(Request $request)
{
    $dep=$request->dep; 
$task = task::where('dep_name',$dep) ->get();
return response()->json($task);
}


public function update(Request $request)
{
$id=$request->id;
$this->validate($request, [
'name' => 'required',
'deadline' => 'required',
'dep_name' => 'required',
'status' => 'required'
]);
$input = $request->all();
$task = task::find($id);
$task->update($input);

return response()->json('task update successfully');
}



public function update_task_status(Request $request)
{
$id=$request->id;
$this->validate($request, [
'status' => 'required'
]);
$input = $request->all();
$task = task::find($id);
$task->update($input);

return response()->json('task update successfully');
}



public function destroy(Request $request)
{
$id=$request->id;
task::find($id)->delete();
return response()->json('task deleted successfully');
}
}
