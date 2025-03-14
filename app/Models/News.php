<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        // 'user_id',
        'title',
        'attachments',
        'body',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];
}
