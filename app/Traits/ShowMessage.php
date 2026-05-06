<?php

namespace App\Traits;

trait ShowMessage
{
    public bool $showMessage = false;
    public string $messageType = 'success';
    public string $message = '';

    private function showMessage(string $message, string $type = 'success'){
        $this->dispatch('show-message', message: $message, type: $type);
    }
}