<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'email',
        'company',
        'website',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
