<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->unsignedInteger('unit_id')->nullable(); //jadi unsignedInteger
            $table->foreign('unit_id')->references('id')->on('unit');
            $table->string('title', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('min_qualification', 255)->nullable();
            $table->integer('quota')->nullable();
            $table->date('open_date')->nullable();
            $table->date('close_date')->nullable();
            $table->string('status', 255)->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); //jadi unsignedBigInteger
            $table->foreign('created_by')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
};
