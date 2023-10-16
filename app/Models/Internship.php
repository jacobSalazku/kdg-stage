<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'email',
        'company',
        'website',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
