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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('shop_info')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('price')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
