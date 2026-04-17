<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Models\UserIdentifier;
use App\Models\UserIdentifierType;
use App\Rules\EmailOrPhone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public string $full_name;
    public string $email_or_phone;
    public string $password;
    public string $password_confirmation;

    public function save(){
        $this->validate([
            'full_name' => 'required|string|max:255',
            'email_or_phone' => ['required', new EmailOrPhone()],
            'password' => 'required|string|min:8|confirmed',
        ]);

        $exists = UserIdentifier::where('value', $this->email_or_phone)
        ->orWhere('value', $this->addPhoneprefix($this->email_or_phone))
        ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'email_or_phone_exists' => 'Uma conta com esse email/celular já existe!'
            ]);
        }

        try{
            DB::transaction(function(){
                $user_identifier_types = UserIdentifierType::all();

                $user = new User();
                $user->full_name = $this->full_name;
                $user->password = Hash::make($this->password);
                $user->save();

                $user_identifier = new UserIdentifier();
                $user_identifier->user_id = $user->id;
                if ($this->isEmail($this->email_or_phone)) {
                    $user_identifier->user_identifier_type_id = $user_identifier_types->where('name', 'email')->first()->id;
                    $user_identifier->value = $this->email_or_phone;
                }

                if (isPhone($this->email_or_phone)) {
                    $user_identifier->user_identifier_type_id = $user_identifier_types->where('name', 'phone')->first()->id;
                    $user_identifier->value = $this->addPhoneprefix($this->email_or_phone);
                }
                $user_identifier->save();
            });

            return true;
        }catch(\Exception $e){
            Log::error('Error creating user: ' . $e->getMessage());
            
            return false;
        }
    }

    private function isEmail(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function addPhoneprefix($value){
        $prefix = '+258';

        if (substr($value, 0, strlen($prefix)) !== $prefix) {
            return $prefix . $value;
        }

        return $value;

    }
}
