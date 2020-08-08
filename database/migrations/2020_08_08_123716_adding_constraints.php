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

        Schema::table('USERS', function (Blueprint $table) {
            $table->unsignedBigInteger('COMPANY_ID')->after('USER_FULL_NAME')->nullable();
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            $table->unsignedBigInteger('ROLE_ID')->after('ACTIVE')->nullable();
            $table->foreign('ROLE_ID')->references('ROLE_ID')->on('ROLES');
        });
        Schema::table('USER_COMPANIES', function (Blueprint $table) {
            $table->unsignedBigInteger('USER_ID')->after('USER_COMPANY_ID')->nullable();    
            $table->foreign('USER_ID')->references('USER_ID')->on('USERS');
            $table->unsignedBigInteger('COMPANY_ID')->after('USER_ID')->nullable();    
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
        });
        Schema::table('ITEMS', function (Blueprint $table) {
            $table->unsignedBigInteger('COMPANY_ID')->after('ITEM_ENGLISH_NAME')->nullable();    
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
        });
        Schema::table('COMPANY', function (Blueprint $table) {
            $table->unsignedBigInteger('BANK_ID')->after('EQUITY_CAPTIAL')->nullable();    
            $table->foreign('BANK_ID')->references('BANK_ID')->on('BANKS');
            $table->unsignedBigInteger('SAFE_ID')->after('BANK_ID')->nullable();    
            $table->foreign('SAFE_ID')->references('id')->on('SAFE');
        });
        Schema::table('CASH_MASTER', function (Blueprint $table) {
            $table->unsignedBigInteger('PERSON_ID')->after('STATEMENT')->nullable();    
            $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->unsignedBigInteger('COMPANY_ID')->after('PERSON_NAME')->nullable();    
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            $table->unsignedBigInteger('OUTGOING_TYPE_ID')->after('CASH_AMOUNT')->nullable();    
            $table->foreign('OUTGOING_TYPE_ID')->references('OUTGOING_TYPE_ID')->on('OUTGOING_TYPES');
            $table->unsignedBigInteger('PURCHASING_TYPE_ID')->after('OUTGOING_TYPE_ID')->nullable();    
            $table->foreign('PURCHASING_TYPE_ID')->references('PURCHASING_TYPE_ID')->on('PURCHASING_TYPES');
            $table->unsignedBigInteger('SERVICE_TYPE_ID')->after('PURCHASING_TYPE_ID')->nullable();    
            $table->foreign('SERVICE_TYPE_ID')->references('SERVICE_TYPE_ID')->on('SERVICES_TYPES');
            $table->unsignedBigInteger('GUIDED_ITEM_ID')->after('NET_VALUE')->nullable();    
            $table->foreign('GUIDED_ITEM_ID')->references('GUIDED_ITEM_ID')->on('GUIDED_ITEMS');
        });
        Schema::table('PERSONS', function (Blueprint $table) {
            $table->unsignedBigInteger('PERSON_TYPE_ID')->after('PERSON_NICK_NAME')->nullable(); 
            $table->foreign('PERSON_TYPE_ID')->references('PERSON_TYPE_ID')->on('PERSON_TYPES'); 
            $table->unsignedBigInteger('COMPANY_ID')->after('BALANCE_START_DATE')->nullable();    
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
        });
        Schema::table('INVOICE_ITEMS', function (Blueprint $table) {
            $table->unsignedBigInteger('ITEM_ID')->after('STORE_ITEM')->nullable(); 
            $table->foreign('ITEM_ID')->references('ITEM_ID')->on('ITEMS'); 
            $table->unsignedBigInteger('INV_ID')->after('NET_VALUE')->nullable(); 
            $table->foreign('INV_ID')->references('INV_ID')->on('INVOICES'); 
        });
        Schema::table('BUSINESS_ITEMS_SETUP', function (Blueprint $table) {
            $table->unsignedBigInteger('ITEM_CASE_ID')->after('ITEM_VALUE')->nullable();    
            $table->foreign('ITEM_CASE_ID')->references('ITEM_CASE_ID')->on('BUSINESS_ITEMS_SETUP_CASES');
            $table->unsignedBigInteger('GUIDED_ITEM_ID')->after('ITEM_CASE_ID')->nullable();    
            $table->foreign('GUIDED_ITEM_ID')->references('GUIDED_ITEM_ID')->on('GUIDED_ITEMS');
        });
        Schema::table('INVOICES', function (Blueprint $table) {
            $table->unsignedBigInteger('PERSON_ID')->after('SERIAL')->nullable();    
            $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->unsignedBigInteger('COMPANY_ID')->after('PERSON_NAME')->nullable();    
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            $table->unsignedBigInteger('OUTGOING_TYPE_ID')->after('COMPANY_ID')->nullable();    
            $table->foreign('OUTGOING_TYPE_ID')->references('OUTGOING_TYPE_ID')->on('OUTGOING_TYPES');
            $table->unsignedBigInteger('PURCHASING_TYPE_ID')->after('OUTGOING_TYPE_ID')->nullable();    
            $table->foreign('PURCHASING_TYPE_ID')->references('PURCHASING_TYPE_ID')->on('PURCHASING_TYPES');
            $table->unsignedBigInteger('SERVICE_TYPE_ID')->after('PURCHASING_TYPE_ID')->nullable();    
            $table->foreign('SERVICE_TYPE_ID')->references('SERVICE_TYPE_ID')->on('SERVICES_TYPES');
        });
        Schema::table('FINAN_TRANSACTIONS', function (Blueprint $table) {
            $table->unsignedBigInteger('TRANSACTION_TYPE_ID')->after('TRANSACTION_ID')->nullable();    
            $table->foreign('TRANSACTION_TYPE_ID')->references('TRANSACTION_TYPE_ID')->on('FINAN_TRANSACTIONS_TYPES');
            $table->unsignedBigInteger('PERSON_ID')->after('INVOICE_NO')->nullable();    
            $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->unsignedBigInteger('PERSON_TYPE_ID')->after('PERSON_NAME')->nullable();    
            $table->foreign('PERSON_TYPE_ID')->references('PERSON_TYPE_ID')->on('PERSON_TYPES');
            $table->unsignedBigInteger('SAFE_ID')->after('PERSON_TYPE_ID')->nullable();    
            $table->foreign('SAFE_ID')->references('id')->on('SAFE');
            $table->unsignedBigInteger('BANK_ID')->after('SAFE_ID')->nullable();    
            $table->foreign('BANK_ID')->references('BANK_ID')->on('BANKS');
            $table->unsignedBigInteger('CHEQUE_ID')->after('BANK_ID')->nullable();    
            $table->foreign('CHEQUE_ID')->references('CHEQUE_ID')->on('CHEQUES');
            $table->unsignedBigInteger('CASH_ID')->after('PURCH_SALES_STATEMENT')->nullable();    
            $table->foreign('CASH_ID')->references('id')->on('CASH_MASTER');
            $table->unsignedBigInteger('INV_ID')->after('CASH_ID')->nullable();    
            $table->foreign('INV_ID')->references('INV_ID')->on('INVOICES');
            $table->unsignedBigInteger('ITEM_ID')->after('INV_ID')->nullable();    
            $table->foreign('ITEM_ID')->references('ITEM_ID')->on('ITEMS');
            $table->unsignedBigInteger('INV_ITEM_ID')->after('ITEM_ID')->nullable();    
            $table->foreign('INV_ITEM_ID')->references('id')->on('INVOICES_ITEMS');
        });
        Schema::table('CHEQUES', function (Blueprint $table) {
            $table->unsignedBigInteger('PERSON_ID')->after('RELEASE_DATE')->nullable();    
            $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->unsignedBigInteger('BANK_ID')->after('PERSON_NAME')->nullable();    
            $table->foreign('BANK_ID')->references('BANK_ID')->on('BANKS');
        });
        Schema::table('BALANCE_YEARS', function (Blueprint $table) {
            $table->unsignedBigInteger('COMPANY_ID')->after('PERIOD_TO_DATE')->nullable();    
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
        });
        Schema::table('BALANCE_MONTHS', function (Blueprint $table) {
            $table->unsignedBigInteger('COMPANY_ID')->after('PERIOD_END_DATE')->nullable();    
            $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
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

        Schema::table('USERS', function (Blueprint $table) {
            // $table->dropForeign(['ROLE_ID']);
            $table->dropForeign('users_role_id_foreign');
            $table->dropForeign('users_company_id_foreign');
            
        });
        Schema::table('USER_COMPANIES', function (Blueprint $table) {
            // $table->dropForeign(['USER_ID','COMPANY_ID']);
            $table->dropForeign('user_companies_user_id_foreign');
            $table->dropForeign('user_companies_company_id_foreign');
            
        });
        Schema::table('ITEMS', function (Blueprint $table) {
            // $table->dropForeign(['COMPANY_ID']);
            $table->dropForeign('items_company_id_foreign');

        });
        Schema::table('COMPANY', function (Blueprint $table) {
            // $table->dropForeign(['BANK_ID','SAFE_ID']);
            $table->dropForeign('company_bank_id_foreign');
            $table->dropForeign('company_safe_id_foreign');

        });
        Schema::table('CASH_MASTER', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_ID','COMPANY_ID','OUTGOING_TYPE_ID','PURCHASING_TYPE_ID','SERVICE_TYPE_ID','GUIDED_ITEM_ID']);
            $table->dropForeign('cash_master_person_id_foreign');
            $table->dropForeign('cash_master_company_id_foreign');
            $table->dropForeign('cash_master_outgoing_type_id_foreign');
            $table->dropForeign('cash_master_purchasing_type_id_foreign');
            $table->dropForeign('cash_master_service_type_id_foreign');
            $table->dropForeign('cash_master_guided_item_id_foreign');

        });
        Schema::table('PERSONS', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_TYPE_ID','COMPANY_ID']);
            $table->dropForeign('persons_person_type_id_foreign');
            $table->dropForeign('persons_company_id_foreign');

        });
        Schema::table('INVOICE_ITEMS', function (Blueprint $table) {
            // $table->dropForeign(['ITEM_ID','INV_ID']);
            $table->dropForeign('invoice_items_item_id_foreign');
            $table->dropForeign('invoice_items_inv_id_foreign');

        });
        Schema::table('BUSINESS_ITEMS_SETUP', function (Blueprint $table) {
            // $table->dropForeign(['ITEM_CASE_ID','GUIDED_ITEM_ID']);
            $table->dropForeign('business_items_setup_item_case_id_foreign');
            $table->dropForeign('business_items_setup_guided_item_id_foreign');

        });
        Schema::table('INVOICES', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_ID','COMPANY_ID','OUTGOING_TYPE_ID','PURCHASING_TYPE_ID','SERVICE_TYPE_ID']);
            $table->dropForeign('invoices_person_id_foreign');
            $table->dropForeign('invoices_company_id_foreign');
            $table->dropForeign('invoices_outgoing_type_id_foreign');
            $table->dropForeign('invoices_purchasing_type_id_foreign');
            $table->dropForeign('invoices_service_type_id_foreign');
            

        });
        Schema::table('FINAN_TRANSACTIONS', function (Blueprint $table) {
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
        Schema::table('CHEQUES', function (Blueprint $table) {
            // $table->dropForeign(['PERSON_ID','BANK_ID']);
            $table->dropForeign('cheques_person_id_foreign');
            $table->dropForeign('cheques_bank_id_foreign');

        });
        Schema::table('BALANCE_YEARS', function (Blueprint $table) {
            // $table->dropForeign(['COMPANY_ID']);
            $table->dropForeign('balance_years_company_id_foreign');

        });
        Schema::table('BALANCE_MONTHS', function (Blueprint $table) {
            // $table->dropForeign(['COMPANY_ID']);
            $table->dropForeign('balance_months_company_id_foreign');

        });
    }
}
