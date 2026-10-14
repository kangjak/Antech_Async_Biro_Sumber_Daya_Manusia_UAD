<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('performance_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('evaluation_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada performance_evaluation.
            $table->foreign('evaluation_id')->references('id')->on('performance_evaluation');
            $table->text('description')->nullable();
            $table->string('unit', 255)->nullable();
            $table->decimal('target_value', 8, 2)->nullable();
            $table->decimal('realization_value', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('score', 8, 2)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('performance_items');
    }
};
