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
        'collected_amount',
        'required_amount',
        'photo',
        'mobile_payment_phones',
        'request_id',
    ];

    protected $casts = [
        "mobile_payment_phones" => "array"
    ];

    protected $appends = [
        "photo_url"
    ];

    /**
     * ----------------------------------------------------
     * Associations
     * ----------------------------------------------------
     */

    public function type()
    {
        return $this->belongsTo(DonationCallType::class, "type_id");
    }

    /**
     * ----------------------------------------------------
     */

    /**
     * ----------------------------------------------------
     * Attributes getters
     * ----------------------------------------------------
     */

    public function getPhotoUrlAttribute()
    {
        return url("/storage/images/donation_calls") . "/" . $this->photo;
    }

    /**
     * ----------------------------------------------------
     */
}
