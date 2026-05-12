<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $guarded = [];

    public function items():HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payments():HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function address():BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address_id');
    }

    public function getPaymentStatusAttribute()
    {
        //pegar a soma dos valores pagos
        $value = $this->payments->sum('paid_amount');

        //Se o valor total for 0 retorna nao pago
        if($value == 0)
            return 'UNPAID';
        //Se o valor for maior que 0 e menor que o preco total retorna iniciado
        if($value > 0 && $value < $this->total_price)
            return 'PAYMENT STARTED';
        //Se o valor pago for maior ou iqual oo preco total retorna concluido
        if($value >= $this->total_price)
            return 'COMPLETED';
    }
}
