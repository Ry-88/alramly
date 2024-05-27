<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Vision extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'description'];
    protected $fillable = [
        'title', 'description', 'image',
    ];


    public function getStatusAttribute($value)
    {
        return $value == 'enabled' ? 'مفعل' : 'غير مفعل';
    }
}
