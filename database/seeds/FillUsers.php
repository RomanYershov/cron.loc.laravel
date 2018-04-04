<?php

use Illuminate\Database\Seeder;
use App\User;

class FillUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name="Misha";
        $user->email="smaik@list.ru";
        $user->dob="1998-12-12";
        $user->password=bcrypt("123456");
        $user->save();

        $user2=new User();
        $user2->name="Nurba";
        $user2->email="Nurbolat@list.ru";
        $user2->dob="1998-12-12";
        $user2->password=bcrypt("111111");
        $user2->save();

    }
}
