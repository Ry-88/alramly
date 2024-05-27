<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

   protected $fillable = ['section_name','status'];
    public function getStatusAttribute($value)
    {
      return $value == 'enabled' ? 'مفعل' : 'غير مفعل';
    }


  
}
