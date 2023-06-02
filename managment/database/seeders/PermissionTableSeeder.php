<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'create_role',
'update_role',
'delete_role',
'show_role',


'create_user',
'update',
'destroy',
'show_user',


'create_task',
'update_task',
'destroy_task',
'show_tasks',
'show_task_dep',
'update_task_status',

];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}