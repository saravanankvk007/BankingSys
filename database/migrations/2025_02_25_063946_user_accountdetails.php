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
		Schema::create("users_accountdetails",function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('account_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('address')->nullable();
            $table->double('open_balance');
            $table->string('currency_code');
			$table->double('final_balance');
			//1 = Admin, 2 = User
            $table->tinyInteger('role')->default(0);
            $table->integer('account_active_status')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
		Schema::dropIfExists(users_accountdetails);
    }
};
