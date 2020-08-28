<?php

use Illuminate\Database\Seeder;

class ServiceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\ServiceType::create([
            'id'=>100,
            'service_type' => 'خدمة',
            'system_lockup' => 1
        ]);
        App\Models\ServiceType::create([
            'id'=>101,
            'service_type' => 'توريد',
            'system_lockup' => 1
        ]);
    }
}
