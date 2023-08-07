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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('display_price');
            $table->string('image')->nullable();
            $table->string('name_ru');
            $table->string('name_uz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_tr')->nullable();
            $table->text('ingredients_ru')->nullable();
            $table->text('ingredients_uz')->nullable();
            $table->text('ingredients_en')->nullable();
            $table->text('ingredients_tr')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_uz')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_tr')->nullable();
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
        Schema::dropIfExists('products');
    }
};
