<?php

use App\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => '1',
                'name'       => 'Lead',
                'created_at' => '2019-12-04 04:22:49',
                'updated_at' => '2019-12-04 04:22:49',
            ],
            [
                'id'         => '2',
                'name'       => 'Customer',
                'created_at' => '2019-12-04 04:22:49',
                'updated_at' => '2019-12-04 04:22:49',
            ],
            [
                'id'         => '3',
                'name'       => 'Partner',
                'created_at' => '2019-12-04 04:22:49',
                'updated_at' => '2019-12-04 04:22:49',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
