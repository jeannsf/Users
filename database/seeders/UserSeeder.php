<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'cesar@sccp.com.br')->first()){
            User::create([
                'name' => 'Cesar',
                'email' => 'cesar@sccp.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'kelly@sccp.com.br')->first()){
            User::create([
                'name' => 'Kelly',
                'email' => 'kelly@sccp.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'jessica@sccp.com.br')->first()){
            User::create([
                'name' => 'Jessica',
                'email' => 'jessica@sccp.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'gabrielly@sccp.com.br')->first()){
            User::create([
                'name' => 'Gabrielly',
                'email' => 'gabrielly@sccp.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
    }
}
