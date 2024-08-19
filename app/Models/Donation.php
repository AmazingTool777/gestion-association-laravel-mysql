<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'giver_info',
        'user_id',
        'donation_call_id',
    ];

    protected $casts = [
        "giver_info" => "array"
    ];
}
