<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInstallmentReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_installment_receiveds', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('member_id')->nullable();
            $table->timestamp('installment_date')->nullable();
            $table->integer('received_amount')->nullable();
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
        Schema::dropIfExists('payment_installment_receiveds');
    }
}
