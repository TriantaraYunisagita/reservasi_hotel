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
        Schema::create('invoice', function (Blueprint $table) {
            $table->unsignedBigInteger('id_invoice')->unique();
            $table->text('deskripsi');
            $table->enum('status',['Bayar','Dp','Lunas']);
            $table->unsignedBigInteger('besar_dp');
            $table->unsignedBigInteger('id_reservasi');
            $table->foreign('id_reservasi')->references('id_reservasi')->on('reservasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};