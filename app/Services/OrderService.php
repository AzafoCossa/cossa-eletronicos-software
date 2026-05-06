<?php

namespace App\Services;

use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\StockBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store($data, $shippingAddress)
    {
        /**
         * Create an array that can be saved in
         * OrderItem model
         */
        $items = $data['items']->map(function($item){
            return [
                'sale_price' => $item['price'],
                'product_variant_id' => $item['product_variant_id'],
                'quantity' => $item['quantity'],
            ];
        });
            try{
                DB::transaction(function() use ($data, $items, $shippingAddress){

                $order = Order::create([
                    'status' => 'RESERVED',
                    'user_id' => Auth::id(),
                    'total_price' => $data['total'],
                    'shipping_address_id' => $shippingAddress->id,
                ]);

                foreach ($items as $item) {

                    $product_variant = ProductVariant::findOrFail($item['product_variant_id']);

                    $stocks = StockBatch::where('product_variant_id', $product_variant->id)
                        ->orderBy('created_at')
                        ->get();

                    $totalStock = $stocks->sum('quantity_remaining');

                    if ($totalStock < $item['quantity']) {
                        throw new \Exception("Stock insuficiente");
                    }

                    $remaining = $item['quantity'];

                    foreach ($stocks as $stock) {
                        if ($remaining <= 0) break;

                        if ($stock->quantity_remaining > 0) {

                            $deduct = min($stock->quantity_remaining, $remaining);

                            $stock->quantity_remaining -= $deduct;
                            $stock->save();

                            $remaining -= $deduct;
                        }
                    }

                    $product_variant->increment('stock_reserved', $item['quantity']);
                    $product_variant->decrement('stock', $item['quantity']);
                }

                $order->items()->createMany($items);
            });

            return true;
            }catch(\Exception $e){
                Log::error($e);
                return false;
            }
        
    }
}