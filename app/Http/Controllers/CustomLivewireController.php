<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Features\SupportFileUploads\FileUploadConfiguration;
use Livewire\Features\SupportFileUploads\FileUploadController;
use Override;

class CustomLivewireController extends FileUploadController
{
    public function handle():array
    {
        $disk = FileUploadConfiguration::disk();

        $filePaths = $this->validateAndStore(request('files'), $disk);

        return ['paths' => $filePaths];
    }
}
