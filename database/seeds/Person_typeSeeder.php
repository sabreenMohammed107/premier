<?php

use Illuminate\Database\Seeder;

class Person_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\PersonType::create([
            'id'=>100,
            'person_type_name' => 'عملاء',
            'notes' => 'from seeder client'
        ]);

        App\Models\PersonType::create([
            'id'=>101,
            'person_type_name' => 'موردين',
            'notes' => 'from seeder supplier'
        ]);

        App\Models\PersonType::create([
            'id'=>102,
            'person_type_name' => 'موظفين',
            'notes' => 'from seeder employee'
        ]);
    }
}
