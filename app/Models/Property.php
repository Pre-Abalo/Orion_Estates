<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'city',
        'address',
        'postal_code',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'sold',
    ];
}
