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
        factory('App\User', 10)->create();

        factory('App\Role', 50)->create();

        factory('App\Committee', 50)->create();

        factory('App\Volunteer', 70)->create();

        factory('App\Article', 20)->create();

        factory('App\Event', 20)->create();

        factory('App\Photo', 70)->create();
    }
}
