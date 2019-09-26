<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new User([
            'name' => "admin",
            'email' => "admin@localhost",
            'password' => "tamphat@123",
        ]);
        $item->save();
    }
}
