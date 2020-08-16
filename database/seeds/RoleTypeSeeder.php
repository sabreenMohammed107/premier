<?php

use Illuminate\Database\Seeder;

class RoleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Role::create([
            'id'=>100,
            'role_name' => 'مراجع عام',
        ]);
        App\Models\Role::create([
            'id'=>101,
            'role_name' => 'مراجع أول',
        ]);
        App\Models\Role::create([
            'id'=>102,
            'role_name' => 'أمين الخزينة',
        ]);
        App\Models\Role::create([
            'id'=>103,
            'role_name' => 'محاسب أول',
        ]);
        App\Models\Role::create([
            'id'=>104,
            'role_name' => 'رئيس مجلس الأدارة',
        ]);
        App\Models\Role::create([
            'id'=>105,
            'role_name' => 'مراجع - الشركة',
        ]);
    }
}
