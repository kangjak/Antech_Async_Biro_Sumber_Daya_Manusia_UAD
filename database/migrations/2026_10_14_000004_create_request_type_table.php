<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('request_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kind', 255)->nullable();
            $table->string('code', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('applies_to', 255)->nullable();
            $table->integer('annual_quota')->nullable();
            $table->boolean('requires_doctorate')->nullable();
            $table->string('period_type', 255)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('request_type');
    }
};
