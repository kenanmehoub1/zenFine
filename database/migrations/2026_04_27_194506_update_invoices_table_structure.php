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
            // حذف الحقول القديمة
            $table->dropColumn(['user_code', 'user_name', 'fees', 'transaction_type', 'no_of_person', 'no_of_transa', 'typing_fees', 'transaction_no', 'transaction_fees', 'other_fees', 'vat_fees']);
            
            // إضافة الحقول الجديدة
            $table->string('service_type')->after('mobile_no');
            $table->text('service_details')->after('service_type');
            $table->integer('service_quantity')->default(1)->after('service_details');
            $table->decimal('service_price', 10, 2)->default(0)->after('service_quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // حذف الحقول الجديدة
            $table->dropColumn(['service_type', 'service_details', 'service_quantity', 'service_price']);
            
            // إعادة الحقول القديمة
            $table->string('user_code')->after('mobile_no');
            $table->string('user_name')->after('user_code');
            $table->decimal('fees', 10, 2)->default(0)->after('user_name');
            $table->string('transaction_type')->after('fees');
            $table->integer('no_of_person')->default(1)->after('transaction_type');
            $table->integer('no_of_transa')->default(1)->after('no_of_person');
            $table->decimal('typing_fees', 10, 2)->default(0)->after('no_of_transa');
            $table->string('transaction_no')->after('typing_fees');
            $table->decimal('transaction_fees', 10, 2)->default(0)->after('transaction_no');
            $table->decimal('other_fees', 10, 2)->default(0)->after('transaction_fees');
            $table->decimal('vat_fees', 10, 2)->default(0)->after('other_fees');
        });
    }
};
