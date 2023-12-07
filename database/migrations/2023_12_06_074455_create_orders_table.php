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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('number', 16);
            $table->string('provinsi')->nullable();
            $table->string('provinsi_id', 16)->nullable();
            $table->string('city')->nullable();
            $table->string('city_id', 16)->nullable();
            $table->string('addres')->nullable();
            $table->string('courier')->nullable();
            $table->string('postal_code')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->decimal('pilih_service', 12)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->enum('payment_status', ['1', '2', '3', '4'])->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal');
            $table->string('snap_token', 36)->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
