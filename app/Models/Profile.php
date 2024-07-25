<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'photo',
        'address',
        'zip_code',
        'origin',
        'id_card',
        'profession',
        'phone',
        'user_id',
    ];

    protected $casts = [
        'id_card' => 'array', // JSON field to array
    ];

    /**
     * ATTRIBUTE: Photo URL
     */
    public function getPhotoUrlAttribute()
    {
        if (!$this->photo) return null;
        return "/storage/images/profiles/" . $this->photo;
    }
}
