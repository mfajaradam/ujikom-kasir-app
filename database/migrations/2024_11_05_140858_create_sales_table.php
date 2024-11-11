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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('SalesID');
            $table->string('sale_date');
            $table->integer('total');
            $table->integer('payment');
            $table->decimal('discount', 5, 2)->default(0);
            $table->integer('subtotal');
            $table->string('status')->default('pending');
            $table->foreignId('Customer_ID')->nullable()->constrained('customers')->onDelete('cascade'); // Hapus deklarasi string Customer_ID sebelumnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
