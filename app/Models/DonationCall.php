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

    protected $appends = [
        "photo_url"
    ];

    /**
     * Map of mobile money prefixes to their names and logos
     */
    public static $mobileMoneyPrefixMap = [
        "032" => [
            "label" => "Orange Money",
            "name" => "orange-money",
            "logo" => "orange-money.png"
        ],
        "033" => [
            "label" => "Airtel Money",
            "name" => "airtel-money",
            "logo" => "airtel-money.png"
        ],
        "034" => [
            "label" => "MVola",
            "name" => "mvola",
            "logo" => "mvola.jpg"
        ],
    ];

    public function addCollectedAmount(int $amount)
    {
        $this->collected_amount += $amount;
        $this->save();
    }

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

    /**
     * ----------------------------------------------------
     * Helpers
     * ----------------------------------------------------
     */

    /**
     * Gets the details about the method of payments supported by the donation call
     * @return array<mixed> Array of the details per mobile money payment
     */
    public function getMobileMoneyPaymentsDetails()
    {
        $details = [];
        foreach ($this->mobile_payment_phones as $phone) {
            $prefix = substr($phone, 0, 3);
            $mobileMoney = self::$mobileMoneyPrefixMap[$prefix];
            $details[] = [
                "label" => $mobileMoney["label"],
                "name" => $mobileMoney["name"],
                "logo_url" => url("/img" . "/" . $mobileMoney["logo"]),
                "phone" => $phone
            ];
        }
        return $details;
    }
}
