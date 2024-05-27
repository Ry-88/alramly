<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name',
        'description',
        'target_group',
        'place',
    ];

    protected $fillable = [
        'name',
        'description',
        'target_group',
        'place',
        'slug',
        'document'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function sponsores()
    {
        return $this->hasMany(Sponsor::class);
    }
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
