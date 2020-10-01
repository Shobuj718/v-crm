<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCategoryAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_category_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('member_id')->nullable();
            $table->integer('payment_category_id')->nullable();
            $table->string('payment_amount')->nullable();
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
        Schema::dropIfExists('payment_category_amounts');
    }
}
