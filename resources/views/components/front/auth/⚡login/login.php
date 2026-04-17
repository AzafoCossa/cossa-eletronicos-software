<?php

use App\Models\UserIdentifier;
use App\Rules\EmailOrPhone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

new class extends Component
{
    public string $email_or_phone;
    public string $password;
    public bool $remember_me = false;

    public function login(){
        $this->validate([
            'email_or_phone' => ['required', new EmailOrPhone()],
            'password' => 'required',
        ]);

        $value = $this->email_or_phone;

        if(isPhone($value)){
            $value = addPhonePrefix($value);
        }

        $userIdentifier = UserIdentifier::where('value', $value)->with('user')->first();

        if(!$userIdentifier){
            throw ValidationException::withMessages(
                ['invalid_credentials' => 'As credenciais fornecidas sao invalidas!'],
            );
        }

        $user = $userIdentifier->user;

        if(!Hash::check($this->password, $user->password)){
            throw ValidationException::withMessages(
                ['invalid_credentials' => 'As credenciais fornecidas sao invalidas, verifique e tente novamento!'],
            );
        }

        Auth::login($user, $this->remember_me);

        session()->regenerate();

        return redirect()->intended('home');
    }
};