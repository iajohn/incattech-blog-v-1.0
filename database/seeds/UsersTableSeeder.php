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
        $user = App\User::create([
        	'name'     => 'Admin',
        	'email'	   => 'info@incattech.com',
        	'password' => bcrypt('admin'),
        	'admin'	   => 1
        ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatars/dp.png',
            'about'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'facebook'  => 'https://facebook.com/incattech',
            'instagram' => 'https://instagram.com/incattech',
            'twitter'   => 'https://twitter.com/incattech',
            'youtube'   => 'https://youtube.com/',
            'whatsapp'  => 'https://api.whatsapp.com/send?phone=2348135282319',
        ]);

        $user = App\User::create([
            'name'     => 'Ifeoluwa',
            'email'    => 'user@incattech.com',
            'password' => bcrypt('user'),
            'admin'    => 0
        ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatars/dp.png',
            'about'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.',
            'facebook'  => 'https://facebook.com/',
            'instagram' => 'https://instagram.com/',
            'twitter'   => 'https://twitter.com/',
            'youtube'   => 'https://youtube.com/',
            'whatsapp'  => 'https://api.whatsapp.com/send?phone=',
        ]);

        // $user = App\User::create([
        //     'name'     => 'F.J.Teemah',
        //     'email'    => 'teema@gmail.com',
        //     'password' => bcrypt('user'),
        //     'admin'    => 0
        // ]);

        // App\Profile::create([
        //     'user_id'   => $user->id,
        //     'avatar'    => 'uploads/avatars/dp.png',
        //     'about'     => 'Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
        //     'facebook'  => 'https://facebook.com/',
        //     'instagram' => 'https://instagram.com/',
        //     'twitter'   => 'https://twitter.com/',
        //     'youtube'   => 'https://youtube.com/',
        //     'whatsapp'  => 'https://api.whatsapp.com/send?phone=',
        // ]);


    }
}
                            