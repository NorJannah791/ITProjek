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
        Schema::create('table_transaksi', function (Blueprint $table) {
            $table->id('idtransaksi'); // Primary key with auto-increment
            $table->date('tanggaltransaksi'); // Date for the transaction
            $table->string('metodepembayaran'); // Payment method
            $table->decimal('totalpembayaran', 10, 2); // Total payment with 10 digits and 2 decimal places
            $table->timestamps(); // Created at and updated at
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
