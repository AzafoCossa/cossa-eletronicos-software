<?php

namespace App\Livewire\Forms;

use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ShippingForm extends Form
{
    public ?string $full_name = null;
    public ?string $email = null;
    public ?string $phone_number = null;
    public ?int $district = null;
    public ?string $address;

    public function save()
    {
        $this->validate([
            'full_name' => "required|string",
            'email' => 'nullable|email',
            'phone_number' => 'required',
            'district' => 'required|exists:districts,id',
            'address' => 'required|string',
        ]);

        $shipping_address = new ShippingAddress();
        $shipping_address->full_name = $this->full_name;
        $shipping_address->email = $this->email;
        $shipping_address->district_id = $this->district;
        $shipping_address->phone_number = addPhonePrefix($this->phone_number);
        $shipping_address->block = $this->address;
        $shipping_address->user_id = Auth::user()->id;
        $shipping_address->save();
        
        return $shipping_address;
    }
}
