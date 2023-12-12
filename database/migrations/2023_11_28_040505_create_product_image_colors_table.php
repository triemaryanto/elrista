<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_image_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_image_id');
            $table->string('color')->nullable();
            $table->string('namecolor')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_image_id')->references('id')->on('product_images')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_image_colors');
    }
};
