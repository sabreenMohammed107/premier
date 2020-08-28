<?php

use Illuminate\Database\Seeder;

class OutgoingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\OutgoingType::create([
            'id'=>100,
            'outgoing_type_name' => 'سلع',
            'system_lockup' => 1
        ]);
        App\Models\OutgoingType::create([
            'id'=>101,
            'outgoing_type_name' => 'خدمات',
            'system_lockup' => 1
        ]);
        App\Models\OutgoingType::create([
            'id'=>102,
            'outgoing_type_name' => 'الات ومعدات',
            'system_lockup' => 1
        ]);
    }
}
