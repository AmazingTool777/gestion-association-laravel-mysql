<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCallRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "payload",
        "status",
        "requeted_by",
        "status",
        "approved_by",
    ];

    protected $casts = [
        "payload" => "array"
    ];
}
