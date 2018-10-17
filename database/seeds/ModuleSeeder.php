<?php

use Illuminate\Database\Seeder;

use  App\Model\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::truncate();
        Module::insert(
            [
                 ['name' => 'Administration','icon_class' => 'fa fa-id-card'],
                 ['name' => 'Settings','icon_class' => 'ft-settings icon-left'],
            ]
        );
    }
}
