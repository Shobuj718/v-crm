<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icards', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('icard_image')->nullable();
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
        Schema::dropIfExists('icards');
    }
}
