<?php

use Illuminate\Database\Seeder;
use App\Model\Menu;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        Menu::insert(
            array
            (
                /**
                 *
                 * @ACL MANAGEMENT
                 *
                 */

                //1 Manage Role
                ['parent_id' => 0,'action'=>NULL,'name'  => 'Manage Role', 'menu_url'  => NULL, 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.01'],
                ['parent_id' => 1,'action'=>NULL,'name'  => 'Add Role', 'menu_url'  => 'role.create', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.02'],
                ['parent_id' => 2,'action'=> 2,'name'  => 'Add', 'menu_url'  => 'role.store', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.03'],
                ['parent_id' => 2,'action'=> 2,'name'  => 'Edit', 'menu_url'  => 'role.edit', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.04'],
                ['parent_id' => 2,'action'=> 2,'name'  => 'Delete', 'menu_url'  => 'role.destroy', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.05'],

                //6 Role Permission
                ['parent_id' => 1,'action'=>NULL,'name'  => 'Role Permission', 'menu_url'  => 'permission.index', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.05'],
                //7 Add User
                ['parent_id' => 0,'action'=>NULL,'name'  => 'Add User', 'menu_url'  => 'user-registration.create', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.06'],
                ['parent_id' => 7,'action'=>7,'name'  => 'Add', 'menu_url'  => 'user-registration.store', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.07'],
                ['parent_id' => 7,'action'=>7,'name'  => 'Edit', 'menu_url'  => 'user-registration.edit', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.08'],
                ['parent_id' => 7,'action'=>7,'name'  => 'Delete', 'menu_url'  => 'user-registration.destroy', 'module_id'  => '1', 'status'  => '1','module_group_id'=>'1.09'],


                )
        );

    }
}
