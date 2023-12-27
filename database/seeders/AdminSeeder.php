<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;  // for role

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('pass@admin')
        ]);
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'carrier']);
        Role::create(['name' => 'distributor']);
        Role::create(['name' => 'driver']);
    }

}
