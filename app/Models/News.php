<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'attachments',
        'body',
        'status'
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
