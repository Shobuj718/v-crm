<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->integer('company_id')->nullable();
            //need other table ...
            // passport copy, visa copy, levi, i-card, others, document,  cidb copy, 
            // deposit date, deposit amount
            // payment-- category, amount
            // installment date, received amount

            //passport info
            
            $table->string('passport_no')->unique();
            $table->string('passport_surname')->nullable();
            $table->string('passport_givename')->nullable();
            $table->string('group_name')->nullable();
            $table->timestamp('passport_expire')->nullable();
            $table->timestamp('passport_sub_date')->nullable();
            $table->timestamp('visa_expire_date')->nullable();
            $table->string('visa_status')->nullable();
            $table->timestamp('visa_sub_date')->nullable();
            $table->string('medical_status')->nullable();
            $table->timestamp('medical_date')->nullable();

            //personal info
            $table->timestamp('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_bd')->nullable();
            $table->string('phone_emergency')->nullable();
            $table->string('email')->nullable();
            $table->string('member_image')->nullable();
            $table->text('present_address')->nullable();
            $table->text('parmanent_address')->nullable();

            //other info
            $table->string('letter_bank')->nullable();
            $table->string('home_country')->nullable();
            $table->string('out_station')->nullable();
            $table->string('current_status')->nullable();
            $table->text('special_note')->nullable();
            $table->string('file_close')->nullable();
            $table->string('passport_status')->nullable();

            //cidb info
            $table->timestamp('cidb_subbmision_date')->nullable();
            $table->timestamp('cidb_delivery_date')->nullable();
            $table->string('cidb_status')->nullable();

            //Depposit info
            $table->string('total_deposit')->nullable();
            $table->string('diposit_discount')->nullable();
            $table->string('permanent_diposit')->nullable();
            $table->string('deposit_refund_amount')->nullable();
            $table->timestamp('deposit_refund_date')->nullable();

            $table->string('diposit_date')->nullable();
            $table->string('deposit_amount')->nullable();

            //Payment info
            $table->integer('payment_category_id')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('payment_total_amount')->nullable();
            $table->string('payment_discount')->nullable();
            $table->string('payment_payable')->nullable();

            $table->timestamp('installment_date')->nullable();
            $table->string('received_amount')->nullable();



            $table->enum('type', ['approved','pending','suspend'])->default('pending');
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
        Schema::dropIfExists('members');
    }
}
