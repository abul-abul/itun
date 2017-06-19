<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins[] = [
            "email" => "admin@admin.com",
            "name"=>"admin",
            "password"=>bcrypt('admin')
        ];

        foreach ($admins as $key=>$admin) {
            User::insert([
                $admin
            ]);
        }
    }

}
