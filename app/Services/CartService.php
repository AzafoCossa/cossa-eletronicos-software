<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartService
{
    protected $request;
    protected $cart;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->cart = $this->getOrCreateCart();
    }

    protected function getOrCreateCart(): Cart
    {
        $sessionId = $this->request->session()->get('cart_session_id');
        $user = $this->request->user();

        if($user){
            $cart = Cart::where('user_id', $user->id)->orWhere('session_id', $sessionId)->first();

            if($cart && $sessionId){
                $this->mergeCarts($sessionId, $cart->id);
                $this->request->session()->forget('cart_session_id');
            }

            if(!$cart){
                $cart = Cart::create(['user_id' => $user->id]);
            }

            return $cart;
        }

        if($sessionId){
            $cart = Cart::where('session_id', $sessionId)->first();

            if($cart){
                return $cart;
            }
        }

        $sessionId = $this->generateSessionId();
        $this->request->session()->put('cart_session_id', $sessionId);

        return Cart::create(['session_id' => $sessionId]);
    }

    protected function generateSessionId(): string
    {
        return Str::random(40);
    }

    public function addItem(int $variantId, int $quantity = 1): CartItem
    {
        $variant = ProductVariant::findOrFail($variantId);

        if($variant->stock < $quantity){
            throw new \Exception("Only {$variant->stock} items in stock");
        }

        $cartItem = CartItem::where('cart_id', $this->cart->id)
            ->where('product_variant_id', $variantId)
            ->first();

        if($cartItem){
            $cartItem->quantity += $quantity;
            $cartItem->save();
        }else{
            $cartItem = CartItem::create([
                'cart_id' => $this->cart->id,
                'product_variant_id' => $variantId,
                'quantity' => $quantity,
                'price' => $variant->price,
            ]);
        }

        $this->cart->touch();

        return $cartItem;
    }

    public function updateItem(int $itemId, int $quantity): void
    {
        $cartItem = CartItem::where('cart_id', $this->cart->id)
            ->where('id', $itemId)
            ->firstOrFail();

        if($quantity <= 0){
            $cartItem->delete();
        }else{
            $variant = ProductVariant::find($cartItem->product_variant_id);

            if($variant && $variant->stock < $quantity){
                throw new \Exception("Only {$variant->stock} items available");
            }

            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        $this->cart->touch();
    }

    public function removeItem(int $itemId): void
    {
        CartItem::where('cart_id', $this->cart->id)
            ->where('id', $itemId)
            ->delete();

        $this->cart->touch();
    }

    public function getCart(): array
    {
        $this->cart->load('items.variant');

        $items = $this->cart->items->map(function($item){
            return [
                'id' => $item->id,
                'product_variant_id' => $item->product_variant_id,
                'name' => $item->variant->product->name . ' ' . $item->variant->name,
                'quantity' => $item->quantity,
                'price' => $item->price/100,
                'total_price' => ($item->quantity * ($item->price/100)),
                'image' => $item->variant->images->first()->path ?? $item->variant->product->images->first()->path,
                'in_stock' => $item->variant->stock >= $item->quantity,
            ];
        });

        return [
            'items' => $items,
            'subtotal' => $this->cart->subtotal,
            'total_items' => $this->cart->total_items,
            'cart_id' => $this->cart->id,
        ];
    }

    public function clearCart(): void
    {
        CartItem::where('cart_id', $this->cart->id)->delete();
        $this->cart->touch();
    }

    protected function mergeCarts(string $guestSessionId, int $userCartId)
    {
        
        $guestCart = Cart::where('session_id', $guestSessionId)->first();

        if($guestCart){
            if($userCartId){
                $guestCart->user_id = $this->request->user()->id;
                $guestCart->save();

                return;
            }
        }

        return;


        // DB::transaction(function() use ($guestCart, $userCartId) {
        //     foreach($guestCart->items as $guestItem){
        //         $userItem = CartItem::where('cart_id', $userCartId)
        //             ->where('product_variant_id', $guestItem->product_variant_id)
        //             ->first();

        //         if($userItem){
        //             $userItem->quantity += $guestItem->quantity;
        //             $userItem->save();
        //         }else{
        //             $guestItem->cart_id = $userCartId;
        //             $guestItem->save();
        //         }
        //     }

        //     $guestCart->delete();
        // });
    }

    public function getCartCount(): int
    {
        return CartItem::where('cart_id', $this->cart->id)->sum('quantity');
    }
}