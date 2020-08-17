<?php

use Illuminate\Database\Seeder;

class BusinessItemsSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\BusinessItemsSetup::create([
            'id'=>100,
            'item_name' => 'القيمه المضافه',
            'item_value'=>14,
            'active'=>1,
             'notes' => 'from seeder ',
           'item_case_id'=>100,
        ]);
        App\Models\BusinessItemsSetup::create([
            'id'=>101,
            'item_name' => 'ض.أ.ت.ص سلع',
            'item_value'=>1,
            'active'=>1,
             'notes' => 'from seeder ',
           'item_case_id'=>100,
        ]);
        App\Models\BusinessItemsSetup::create([
            'id'=>102,
            'item_name' => 'ض.أ.ت.ص.خدمات',
            'item_value'=>3,
            'active'=>1,
             'notes' => 'from seeder ',
           'item_case_id'=>100,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>103,
            'item_name' => 'المورد',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>101,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>104,
            'item_name' => 'الصافى',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>101,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>105,
            'item_name' => 'ض.القيمه المضافه',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>101,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>106,
            'item_name' => 'ض.أ.ت.ص',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>101,
        ]);


        
        App\Models\BusinessItemsSetup::create([
            'id'=>107,
            'item_name' => 'العميل',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>102,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>108,
            'item_name' => 'الصافى',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>102,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>109,
            'item_name' => 'ض.القيمه المضافه',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>102,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>110,
            'item_name' => 'ض.أ.ت.ص',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>102,
        ]);
       

        App\Models\BusinessItemsSetup::create([
            'id'=>111,
            'item_name' => 'الخزينة',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>103,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>112,
            'item_name' => 'البنوك',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>103,
        ]);

        App\Models\BusinessItemsSetup::create([
            'id'=>113,
            'item_name' => 'موظفين ( تمويل خزينة / بنك) ',
            'active'=>1,
            'notes' => 'from seeder ',
           'item_case_id'=>103,
        ]);
    }
}
