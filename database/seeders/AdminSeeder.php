<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'User'];

        foreach($roles as $role){
            $role = Role::create([
                'name' => $role,
                'description' => "Administrator role",
                "created_at" =>  \Carbon\Carbon::now(), 
                "updated_at" => \Carbon\Carbon::now()]);
        }

        $admin = Role::where('name', 'Admin')->first();

        DB::table('users')->insert([
            'name' => 'Global Admin',
            'email' => 'admin@soft.com',
            'password' => Hash::make('Admin@123#'),
            'role_id' => $admin->id,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);

    }
}
