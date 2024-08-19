<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'collected_amount',
        'required_amount',
        'photo',
        'mobile_payment_phones',
        'request_id',
    ];

    protected $casts = [
        "mobile_payment_phones" => "array"
    ];
}
