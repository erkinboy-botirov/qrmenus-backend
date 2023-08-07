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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained();
            $table->string('slug')->default('main');
            $table->string('name_ru');
            $table->string('name_uz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_tr')->nullable();
            $table->timestamps();

            $table->unique(['vendor_id', 'slug']);
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
