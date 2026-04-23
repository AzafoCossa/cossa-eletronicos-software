<?php

use App\Models\ProductVariant;
use App\Models\StockBatch;
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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->string('movement_type');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('quantity');
            $table->foreignIdFor(StockBatch::class)->constrained();
            $table->foreignIdFor(ProductVariant::class)->constrained();
            $table->strong('referenceable_type');
            $table->unsignedBigInteger('referenceable_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
