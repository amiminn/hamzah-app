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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('villa_id')->nullable();
            $table->string('kode_booking')->nullable();
            $table->json('booking_date');
            $table->string('nama_customer');
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('domisili')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('invoice');
            $table->integer('harga_asli')->default(0);
            $table->string('jumlah_pembayaran')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
