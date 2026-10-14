<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->unsignedBigInteger('actor_id')->nullable(); // FK harus unsigned BIGINT agar cocok dengan users.id dari $table->id().
            $table->foreign('actor_id')->references('id')->on('users');
            $table->string('action', 255)->nullable();
            $table->string('entity_type', 255)->nullable();
            $table->integer('entity_id')->nullable();
            $table->string('old_status', 255)->nullable();
            $table->string('new_status', 255)->nullable();
            $table->text('reason')->nullable();
            $table->text('details')->nullable();
            $table->string('ip_address', 255)->nullable();
            $table->timestamp('created_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
};
