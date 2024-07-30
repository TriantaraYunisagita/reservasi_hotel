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
        Schema::create('hargahariini', function (Blueprint $table) {
            $table->unsignedBigInteger('id_hotel')->autoIncrement()->unique();
            $table->unsignedBigInteger('available_room');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_kamar');
            $table->foreign('id_kamar')->references('id_kamar')->on('kamar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hargahariini');
    }
};