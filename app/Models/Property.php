<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function option(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return \Str::slug($this->title);
    }
}
