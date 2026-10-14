<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('unit_type', 255)->nullable();
            $table->boolean('is_active')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('unit');
    }
};
