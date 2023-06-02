<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$data = User::orderBy('id','DESC')->paginate(5);
return response()->json($data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::pluck('name','name')->all();
return response()->json($roles);
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'roles' => 'required'
]);
$input = $request->all();
$input['password'] = Hash::make($input['password']);
$user = User::create($input);
$user->assignRole($request->input('roles'));
return response()->json('User created successfully');
}
/**
* Display the specified resource.
*
*
* @return \Illuminate\Http\Response
*/
public function show(Request $request)
{
$id=$request->id;
$user = User::find($id);
return response()->json($user);
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request)
{
$id=$request->id;
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email,'.$id,
'password' => 'same:confirm-password',
'roles' => 'required'
]);
$input = $request->all();
if(!empty($input['password'])){
$input['password'] = Hash::make($input['password']);
}else{
$input = Arr::except($input,array('password'));
}
$user = User::find($id);
$user->update($input);
DB::table('model_has_roles')->where('model_id',$id)->delete();
$user->assignRole($request->input('roles'));
return response()->json('User update successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
$id=$request->id;
User::find($id)->delete();
return response()->json('User deleted successfully');
}
}