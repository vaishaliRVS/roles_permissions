<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'name'              => 'admin',
                'email'             => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345'),
            ],
            [
                'name'              => 'vaishali',
                'email'             => 'vaishali@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345'),               
            ]
        ];

        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        foreach($data as $newuser){
            $user = User::create($newuser);
            $user->assignRole([$role->id]);
        } 
 
      
    }
}