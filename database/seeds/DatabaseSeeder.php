<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create()->each(function (App\User $user){

            factory(\App\Chusqer::class,50)->create(['user_id' => $user->id]);

        });
    }
}
