<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Document extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];
    use Uuid;
    public $incrementing = false;

    protected $keyType = 'uuid';
    protected $fillable = ['name', 'path', 'document_type'];
}
