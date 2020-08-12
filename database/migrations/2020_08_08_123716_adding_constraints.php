<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('ACTIVE')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('user_companies', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('company_id')->after('user_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
        });
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('item_english_name')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_id')->after('equity_capital')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->unsignedBigInteger('safe_id')->after('bank_id')->nullable();
            $table->foreign('safe_id')->references('id')->on('safe');
        });
        Schema::table('cash_master', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->after('statement')->nullable();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->unsignedBigInteger('company_id')->after('person_name')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('outgoing_type_id')->after('cash_amount')->nullable();
            $table->foreign('outgoing_type_id')->references('id')->on('outgoing_types');
            $table->unsignedBigInteger('purchasing_type_id')->after('outgoing_type_id')->nullable();
            $table->foreign('purchasing_type_id')->references('id')->on('purchasing_types');
            $table->unsignedBigInteger('service_type_id')->after('purchasing_type_id')->nullable();
            $table->foreign('service_type_id')->references('id')->on('services_types');
            $table->unsignedBigInteger('guided_item_id')->after('net_value')->nullable();
            $table->foreign('guided_item_id')->references('id')->on('guided_items');
        });
        Schema::table('persons', function (Blueprint $table) {
            $table->unsignedBigInteger('person_type_id')->after('person_nick_name')->nullable();
            $table->foreign('person_type_id')->references('id')->on('person_types');
            $table->unsignedBigInteger('company_id')->after('balance_start_date')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
        });
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->after('store_item')->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->unsignedBigInteger('inv_id')->after('net_value')->nullable();
            $table->foreign('inv_id')->references('id')->on('invoices');
        });
        Schema::table('business_items_setup', function (Blueprint $table) {
            $table->unsignedBigInteger('item_case_id')->after('item_value')->nullable();
            $table->foreign('item_case_id')->references('id')->on('business_items_setup_cases');
            $table->unsignedBigInteger('guided_item_id')->after('item_case_id')->nullable();
            $table->foreign('guided_item_id')->references('id')->on('guided_items');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->after('serial')->nullable();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->unsignedBigInteger('company_id')->after('person_name')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('outgoing_type_id')->after('company_id')->nullable();
            $table->foreign('outgoing_type_id')->references('id')->on('outgoing_types');
            $table->unsignedBigInteger('purchasing_type_id')->after('outgoing_type_id')->nullable();
            $table->foreign('purchasing_type_id')->references('id')->on('purchasing_types');
            $table->unsignedBigInteger('service_type_id')->after('purchasing_type_id')->nullable();
            $table->foreign('service_type_id')->references('id')->on('services_types');
        });
        Schema::table('finan_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_type_id')->after('id')->nullable();
            $table->foreign('transaction_type_id')->references('id')->on('finan_transactions_types');
            $table->unsignedBigInteger('person_id')->after('invoice_no')->nullable();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->unsignedBigInteger('person_type_id')->after('person_name')->nullable();
            $table->foreign('person_type_id')->references('id')->on('person_types');
            $table->unsignedBigInteger('safe_id')->after('person_type_id')->nullable();
            $table->foreign('safe_id')->references('id')->on('safe');
            $table->unsignedBigInteger('bank_id')->after('safe_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->unsignedBigInteger('cheque_id')->after('bank_id')->nullable();
            $table->foreign('cheque_id')->references('id')->on('cheques');
            $table->unsignedBigInteger('cash_id')->after('purch_sales_statement')->nullable();
            $table->foreign('cash_id')->references('id')->on('cash_master');
            $table->unsignedBigInteger('inv_id')->after('cash_id')->nullable();
            $table->foreign('inv_id')->references('id')->on('invoices');
            $table->unsignedBigInteger('item_id')->after('inv_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->unsignedBigInteger('inv_item_id')->after('item_id')->nullable();
            $table->foreign('inv_item_id')->references('id')->on('invoices_items');
        });
        Schema::table('cheques', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->after('release_date')->nullable();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->unsignedBigInteger('bank_id')->after('person_name')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
        });
        Schema::table('balance_years', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('period_to_date')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
        });
        Schema::table('balance_months', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('period_end_date')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('users', function (Blueprint $table) {
            // $table->dropForeign(['ROLE_ID']);
            $table->dropForeign('users_role_id_foreign');
            $table->dropForeign('users_company_id_foreign');
        });
        Schema::table('user_companies', function (Blueprint $table) {
            // $table->dropForeign(['USER_ID','COMPANY_ID']);
            $table->dropForeign('user_companies_user_id_foreign');
            $table->dropForeign('user_companies_company_id_foreign');
        });
        Schema::table('items', function (Blueprint $table) {
            // $table->dropForeign(['COMPANY_ID']);
            $table->dropForeign('items_company_id_foreign');
        });
        Schema::table('companies', function (Blueprint $table) {
            // $table->dropForeign(['BANK_ID','SAFE_ID']);
            $table->dropForeign('companies_bank_id_foreign');
            $table->dropForeign('companies_safe_id_foreign');
        });
        Schema::table('cash_master', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_ID','COMPANY_ID','OUTGOING_TYPE_ID','PURCHASING_TYPE_ID','SERVICE_TYPE_ID','GUIDED_ITEM_ID']);
            $table->dropForeign('cash_master_person_id_foreign');
            $table->dropForeign('cash_master_company_id_foreign');
            $table->dropForeign('cash_master_outgoing_type_id_foreign');
            $table->dropForeign('cash_master_purchasing_type_id_foreign');
            $table->dropForeign('cash_master_service_type_id_foreign');
            $table->dropForeign('cash_master_guided_item_id_foreign');
        });
        Schema::table('persons', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_TYPE_ID','COMPANY_ID']);
            $table->dropForeign('persons_person_type_id_foreign');
            $table->dropForeign('persons_company_id_foreign');
        });
        Schema::table('invoice_items', function (Blueprint $table) {
            // $table->dropForeign(['ITEM_ID','INV_ID']);
            $table->dropForeign('invoice_items_item_id_foreign');
            $table->dropForeign('invoice_items_inv_id_foreign');
        });
        Schema::table('business_items_setup', function (Blueprint $table) {
            // $table->dropForeign(['ITEM_CASE_ID','GUIDED_ITEM_ID']);
            $table->dropForeign('business_items_setup_item_case_id_foreign');
            $table->dropForeign('business_items_setup_guided_item_id_foreign');
        });
        Schema::table('invoices', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_ID','COMPANY_ID','OUTGOING_TYPE_ID','PURCHASING_TYPE_ID','SERVICE_TYPE_ID']);
            $table->dropForeign('invoices_person_id_foreign');
            $table->dropForeign('invoices_company_id_foreign');
            $table->dropForeign('invoices_outgoing_type_id_foreign');
            $table->dropForeign('invoices_purchasing_type_id_foreign');
            $table->dropForeign('invoices_service_type_id_foreign');
        });
        Schema::table('finan_transactions', function (Blueprint $table) {
            // $table->dropForeign(['TRANSACTION_TYPE_ID','PERSON_ID','PERSON_TYPE_ID','SAFE_ID','BANK_ID','CHEQUE_ID','CASH_ID','INV_ID','ITEM_ID','INV_ITEM_ID']);
            $table->dropForeign('finan_transactions_transaction_type_id_foreign');
            $table->dropForeign('finan_transactions_person_id_foreign');
            $table->dropForeign('finan_transactions_person_type_id_foreign');
            $table->dropForeign('finan_transactions_safe_id_foreign');
            $table->dropForeign('finan_transactions_bank_id_foreign');
            $table->dropForeign('finan_transactions_cheque_id_foreign');
            $table->dropForeign('finan_transactions_cash_id_foreign');
            $table->dropForeign('finan_transactions_inv_id_foreign');
            $table->dropForeign('finan_transactions_item_id_foreign');
            $table->dropForeign('finan_transactions_inv_item_id_foreign');
        });
        Schema::table('cheques', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_ID','BANK_ID']);
            $table->dropForeign('cheques_person_id_foreign');
            $table->dropForeign('cheques_bank_id_foreign');
        });
        Schema::table('balance_years', function (Blueprint $table) {
            // $table->dropForeign(['COMPANY_ID']);
            $table->dropForeign('balance_years_company_id_foreign');
        });
        Schema::table('balance_months', function (Blueprint $table) {
            // $table->dropForeign(['COMPANY_ID']);
            $table->dropForeign('balance_months_company_id_foreign');
        });
    }
}
