<?php

use App\User;
use Illuminate\Database\Seeder;

class FirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Alan Hidalgo Pagoto';
        $user->email = 'alan.pagoto@gmail.com';
        $user->password = bcrypt('123123@');
        $user->save();
    }
}
