<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user =  App\User::create([

          'first_name'=> 'super',
          'last_name'=> 'admin',
          'email'=> 'admin@blog.com',
          'password'=> bcrypt('password'),
          'admin' => 1


        ]);

      // App\Profile::create([
      //   'user_id' => $user->id,
      //   'avatar' =>'uploads/avatars/1.png'
      // ]);

    }
}
