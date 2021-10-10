<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerPlan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seller_plans')->insert([[

            'name' => 'Basic',
            'status' => 1,
            'desc' => 'description',
            'price' => '0',
            'validity' => '30',


        ],
        [
            'name' => 'Premium',
            'status' => 1,
            'desc' => 'description',
            'price' => '1000',
            'validity' => '30',
        ]
        ]
    );
    }
}
