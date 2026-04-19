<?php

namespace App\Traits;

trait ShowMessage
{
    public bool $showMessage = false;
    public string $messageType = 'success';
    public string $message = '';

    private function showMessage(string $type, string $message){
        $this->dispatch('show-message', message: $message, type: $type);
    }
}