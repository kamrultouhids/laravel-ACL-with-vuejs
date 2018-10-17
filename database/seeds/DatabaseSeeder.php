<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(ModuleSeeder::class);
         $this->call(RoleSeeder::class);
         $this->call(MenuSeeder::class);
         $this->call(MenuPermissionSeeder::class);
    }
}
