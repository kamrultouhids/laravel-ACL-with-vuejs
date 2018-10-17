<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();

        User::truncate();
        User::insert(
            [
                ['name'=>'Admin','role_id'=>1,'username' => 'admin','password' => bcrypt('123'), 'remember_token' => str_random(10), 'status' => '1', 'created_at' => $time, 'created_by' => 1],
            ]
        );
    }
}
