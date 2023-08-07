<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('title_ru');
            $table->string('title_uz')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_tr')->nullable();
            $table->unsignedInteger('price');
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
        Schema::dropIfExists('portions');
    }
};
