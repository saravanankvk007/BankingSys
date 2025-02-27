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
        //
		Schema::create("fund_transfer",function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
            $table->string('trf_frm_accountnumber');
            $table->string('trf_to_accountnumber');
            $table->double('trf_amount');
            $table->string('trf_currency_code');
            $table->string('trf_frm_currency_code');
            $table->string('trf_to_currency_code');
            $table->integer('trf_status')->default(0);
            $table->timestamp('trf_date');
			$table->timestamps();
			$table->foreign('trf_frm_accountnumber')->references('account_number')->on('users_accountdetails');
			$table->foreign('trf_to_accountnumber')->references('account_number')->on('users_accountdetails');
            
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
		Schema::dropIfExists('fund_transfer');
    }
};
