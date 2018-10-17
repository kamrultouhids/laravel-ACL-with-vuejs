<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\Model\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        Role::truncate();
        Role::insert(
            [
                ['role_name' => 'Super Admin','created_at'=>$time,'updated_at'=>$time],
                ['role_name' => 'HR','created_at'=>$time,'updated_at'=>$time],
                ['role_name' => 'Accounts','created_at'=>$time,'updated_at'=>$time],
                ['role_name' => 'Developer','created_at'=>$time,'updated_at'=>$time],
            ]

        );
    }
}
