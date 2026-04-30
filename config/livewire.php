<?php

return [

    'temporary_file_upload' => [
        'disk' => null,
        'rules' => 'file|max:5120',
        'middleware' => ['web'],
    ],
];