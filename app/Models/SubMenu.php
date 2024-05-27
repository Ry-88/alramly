<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $fillable = ['name','endpoint','status','route_name'];
    public function mainMenu()
    {
        return $this->belongsTo(MainMenu::class);
    }

    public function getStatusAttribute($value)
    {
        return $value == 'enabled' ? 'مفعل' : 'غير مفعل';
    }

}
