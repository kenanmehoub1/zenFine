<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Make existing fields nullable
            $table->string('company_name')->nullable()->change();
            $table->string('mobile_no')->nullable()->change();
            $table->string('service_type')->nullable()->change();
            $table->text('service_details')->nullable()->change();
            $table->integer('service_quantity')->nullable()->change();
            $table->decimal('service_price', 10, 2)->nullable()->change();
            $table->decimal('total_fees', 10, 2)->nullable()->change();

            // Add new fields
            $table->string('customer_trn')->nullable()->after('mobile_no');
            $table->string('transaction_type')->nullable()->after('customer_trn');
            $table->decimal('government_fees', 10, 2)->nullable()->after('transaction_type');
            $table->decimal('service_fees', 10, 2)->nullable()->after('government_fees');
            $table->integer('number_of_transactions')->nullable()->after('service_fees');
            $table->decimal('amount', 10, 2)->nullable()->after('number_of_transactions');
            $table->decimal('cashier_payment', 10, 2)->nullable()->after('amount');
            $table->string('payment_type')->nullable()->after('cashier_payment');
            $table->string('user_name')->nullable()->after('payment_type');
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['customer_trn','transaction_type','government_fees','service_fees','number_of_transactions','amount','cashier_payment','payment_type','user_name']);
        });
    }
};
