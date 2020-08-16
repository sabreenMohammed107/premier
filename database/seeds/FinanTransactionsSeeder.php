<?php

use Illuminate\Database\Seeder;

class FinanTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\FinanTransactionType::create([
            'id'=>102,
            'transaction_type' => 'حركة مشتريات نقدية',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>103,
            'transaction_type' => 'حركة مشتريات اجله',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>104,
            'transaction_type' => 'حركة مقبوضات نقدية',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>105,
            'transaction_type' => 'حركة مقبوضات اجله',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>106,
            'transaction_type' => 'حركة ايداع خزينه',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>107,
            'transaction_type' => 'حركة صرف خزينه',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>108,
            'transaction_type' => 'حركة ايداع بنكي',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>109,
            'transaction_type' => 'حركة صرف بنكي',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>110,
            'transaction_type' => 'ترصيد افتتاحي',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>111,
            'transaction_type' => 'ترصيد سنوي',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>112,
            'transaction_type' => 'مرتد فاتورة مبيعات',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>113,
            'transaction_type' => 'مرتد فاتورة مشتريات',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>114,
            'transaction_type' => 'مرتد ايداع شيك',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>115,
            'transaction_type' => 'مرتد صرف شيك',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>116,
            'transaction_type' => 'حركة زيادة صنف',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>117,
            'transaction_type' => 'حركة صرف صنف',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>118,
            'transaction_type' => 'حركة تسوية زياده',
            'system_lockup' => 1
        ]);
        App\Models\FinanTransactionType::create([
            'id'=>119,
            'transaction_type' => 'حركة تسوية عجز',
            'system_lockup' => 1
        ]);


    }
}
