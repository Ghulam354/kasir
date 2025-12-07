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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            // Relasi ke user (kasir)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // Relasi ke member (pelanggan) - boleh NULL
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')
                  ->references('id')
                  ->on('members')
                  ->onDelete('set null');

            // Nominal
            $table->integer('total')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('grand_total')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
