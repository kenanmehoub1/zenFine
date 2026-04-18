<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->string('company_name');
            $table->string('mobile_no');
            $table->string('user_code');
            $table->string('user_name');
            $table->integer('fees');
            $table->string('transaction_type');
            $table->integer('no_of_person');
            $table->integer('no_of_transa');
            $table->integer('typing_fees');
            $table->string('transaction_no');
            $table->integer('transaction_fees');
            $table->integer('other_fees');
            $table->integer('vat_fees');
            $table->integer('total_fees');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};