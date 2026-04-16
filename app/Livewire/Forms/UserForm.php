<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Models\UserIdentifier;
use App\Models\UserIdentifierType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'email_or_phone' => ['required', function($attribute, $value, $fail) {
                if (!$this->isEmail($value) && !$this->isPhone($value)) {
                    $fail('O campo deve ser um email ou número de telefone válido.');
                }
            }],
            'password' => 'required|string|min:8|confirmed',
        ]);

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

            if ($this->isPhone($this->email_or_phone)) {
                $user_identifier->user_identifier_type_id = $user_identifier_types->where('name', 'phone')->first()->id;
                $user_identifier->value = $this->addPhoneprefix($this->email_or_phone);
            }
            $user_identifier->save();
        });
    }

    private function isEmail(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function isPhone(string $value): bool
    {
        // Simple regex for phone number validation (you can adjust it as needed)
        return preg_match('/^\+?[0-9]{7,15}$/', $value) === 1;
    }

    private function addPhoneprefix($value){
        $prefix = '+258';

        if (substr($value, 0, strlen($prefix)) !== $prefix) {
            return $prefix . $value;
        }

        return $value;

    }
}
