<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AclUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('acl_users')->insert([
            [
                'id' => 1,
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'fullname' => 'Administrator',
                'email' => 'admin@gmail.com',
                'phone' => '0900000001',
                'birthday' => '1990-01-01',
                'gender' => 1,
                'avatar' => 'avatar_admin.png',
                'status' => 1,
                'remember_token' => null,
                'active_code' => 'ACT123ADMIN',
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'username' => 'user1',
                'password' => bcrypt('user123'),
                'fullname' => 'User One',
                'email' => 'user1@example.com',
                'phone' => '0900000002',
                'birthday' => '1995-05-10',
                'gender' => 0,
                'avatar' => 'avatar_user1.png',
                'status' => 1,
                'remember_token' => null,
                'active_code' => 'ACT123USER1',
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'username' => 'user2',
                'password' => bcrypt('user123'),
                'fullname' => 'User Two',
                'email' => 'user2@example.com',
                'phone' => '0900000003',
                'birthday' => '1996-06-15',
                'gender' => 1,
                'avatar' => 'avatar_user2.png',
                'status' => 1,
                'remember_token' => null,
                'active_code' => 'ACT123USER2',
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ]);
    }
}
