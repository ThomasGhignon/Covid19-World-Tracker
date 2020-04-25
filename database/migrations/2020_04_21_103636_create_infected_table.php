<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfectedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infected', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName',100);
            $table->string('lastName',100);
            $table->date('birthday');
            $table->string('gender');
            $table->integer('phone');
            $table->string('email',100);
            $table->string('country',100);
            $table->string('address',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infected');
    }
}
