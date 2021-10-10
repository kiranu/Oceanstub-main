<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([


            'logo' =>'oceanstub.jpg',
            'fb_link' =>'#',
            'google_link' =>'#',
            'ig_link' =>'#',
            'linkedin_link' =>'#',
            'twitter_link' =>'#',
            'email' =>'info@example.com',
            'mobile' =>'345678',
            'address' =>'asggxas hd as',
                ]);
    }
}
