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


        $users = factory(App\User::class, 10)->create();

        $hashtags = factory(App\Hashtag::class, 20)->create();

        $users->each(function(App\User $user) use ($users, $hashtags) {
            $chusqers = factory(App\Chusqer::class,20)->create([
                'user_id' => $user->id,
            ]);

            $chusqers->each(function(App\Chusqer $chusqer) use ($chusqers, $hashtags, $users){
                $chusqer->hashtags()->sync(
                    $hashtags->random(mt_rand(1,5))
                );
            });

            //
        });



//        $users->each(function(App\User $user) use ($users){
//
//            $hashtags = factory(App\Hashtag::class, 20)->create();
//
//            $chusqers = factory(App\Chusqer::class)
//                ->times(20)
//                ->create([
//                    'user_id' => $user->id,
//                ]);
//
//            $chusqers->each(function(App\Chusqer $chusqer) use ($chusqers, $hashtags){
//                $chusqer->hashtags()->sync(
//                    $hashtags->random(mt_rand(1,5))
//                );
//            });
//
////            $hashtags->each(function (App\Hashtag $hashtag) use ($chusqers){
////                $hashtag->chusqers()
////                    ->sync(
////                        $chusqers->random(3)
////                    );
////            });
//
//        });





    }
}
