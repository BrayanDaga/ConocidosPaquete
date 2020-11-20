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
        factory(\App\User::class)->create(['name'=>'Brayan Vilchez Daga','email'=>'brayandaga5@gmail.com']);
        // $this->call(UserSeeder::class);
        factory(\App\User::class, 10)->create()->each(function ($user) {
            $user->posts()->saveMany(factory(\App\Post::class, 3)->make());
        });

        factory(\App\Comment::class,20)->create();
    }
}
