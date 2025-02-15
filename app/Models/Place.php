<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
