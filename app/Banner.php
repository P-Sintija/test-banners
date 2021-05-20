<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'position',
        'file_name',
        'file_path',
        'original_file_name',
        'url',
        'redirect'
    ];
}
