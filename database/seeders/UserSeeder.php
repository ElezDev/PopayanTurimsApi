<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name'=>'Edwin Ledezma',
        //     'email'=>'edwinLedezma2013@gmail.com',
        //     'password'=> bcrypt('1234567890')
        // ])->assignRole('admin');

        User::factory(20)->create();


    }
}
