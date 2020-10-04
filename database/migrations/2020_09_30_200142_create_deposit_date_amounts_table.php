<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositDateAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit_date_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('member_id')->nullable();
            $table->integer('deposit_amount')->nullable();
            $table->timestamp('diposit_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposit_date_amounts');
    }
}
