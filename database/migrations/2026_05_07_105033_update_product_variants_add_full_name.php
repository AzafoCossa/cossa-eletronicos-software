<?php

use App\Models\ProductVariant;
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
        $products = ProductVariant::with('product')->get();
        
        Schema::table('product_variants', function(Blueprint $table){
            $table->string('full_name')->nullable()->after('sku');
        });

        foreach($products as $product){
            $product->full_name = $product->product->name . ' '. $product->name;
            $product->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function(Blueprint $table){
            $table->dropColumn('full_name');
        });
    }
};
