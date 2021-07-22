<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->delete();
        $adminsRecords = [
            [
            'id' =>1,
            'name' => 'admin',
            'type' => 'admin',
            'mobile' => '2125458463',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$SekBe7RKFJDgME3y86/RteSGxf492IAvatd5SD9sFxQrgZ7iMyTkK', 
            'image' => '',
            'status' => 1]
                    ];
        foreach ($adminsRecords as $key => $record) {
            \App\Admin::create($record);
        }
    }
}
