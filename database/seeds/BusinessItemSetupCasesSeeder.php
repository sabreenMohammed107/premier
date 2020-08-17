<?php

use Illuminate\Database\Seeder;

class BusinessItemSetupCasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\BusinessItemSetupCases::create([
            'id'=>100,
            'item_case_name' => 'الضريبه',
            'notes' => 'from seeder '
        ]);

        App\Models\BusinessItemSetupCases::create([
            'id'=>101,
            'item_case_name' => 'المشتريات',
            'notes' => 'from seeder '
        ]);

        App\Models\BusinessItemSetupCases::create([
            'id'=>102,
            'item_case_name' => 'المبيعات',
            'notes' => 'from seeder '
        ]);

        App\Models\BusinessItemSetupCases::create([
            'id'=>103,
            'item_case_name' => 'السيوله النقديه',
            'notes' => 'from seeder '
        ]);
    }
}
