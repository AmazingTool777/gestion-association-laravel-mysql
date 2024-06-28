<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'starts_at',
        'ends_at',
        'location',
        'posted_by',
    ];
}
