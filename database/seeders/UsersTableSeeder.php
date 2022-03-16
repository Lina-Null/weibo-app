<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'Lina';
        $user->email = '764662030@qq.com';
        $user->password = bcrypt('123456') ;
        $user->password_show = '123456';
        $user->is_admin = true;
        $user->save();
    }
}
