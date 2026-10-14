<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->unsignedInteger('unit_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada unit.
            $table->foreign('unit_id')->references('id')->on('unit');
            $table->string('category', 255)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();
            $table->boolean('is_published')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); // FK harus unsigned BIGINT agar cocok dengan users.id dari $table->id().
            $table->foreign('created_by')->references('id')->on('users');
            $table->string('first_day', 255)->nullable();
            $table->string('last_day', 255)->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('work_schedules');
    }
};
