<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => "1",
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt(123),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'role_id' => "2",
            'name' => "Seller",
            'email' => "seller@admin.com",
            'password' => bcrypt(123),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'role_id' => "3",
            'name' => "Customer",
            'email' => "customer@admin.com",
            'password' => bcrypt(123),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
