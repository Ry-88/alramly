<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Membership extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'full_name',
        'membership_type',
        'email',
        'phone',
        'birth_date',
        'job',
        'city',
        'status',
        'reason_refuse',
        'image_extension',
        'expirted_at',
        'membership_no',
        'hasEdit'
    ];

    public $translatable = [
        'full_name',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getMemberCardStatus()
    {
        if ($this->membership_card == 'yes' && $this->hasEdit == null) {
            return 'تم الارسال';
        } else {
            return 'لم يتم الارسال';
        }
    }
}
