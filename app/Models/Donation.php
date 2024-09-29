<?php

namespace App\Models;

use App\Models\DonationCall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * ----------------------------------------------------
     * Associations
     * ----------------------------------------------------
     */

    public function donationCall()
    {
        return $this->belongsTo(DonationCall::class, "donation_call_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ----------------------------------------------------
     */
}
