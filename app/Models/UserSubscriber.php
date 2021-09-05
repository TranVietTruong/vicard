<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscriber extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $casts = [
        'subscriber' => 'array'
    ];
}
