<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model 
{
    use HasFactory;
    protected $table = 'main_menus'; 
    protected $fillable = ['name','endpoint','status','route_name'];

  public function subMeuns()
  {
    return $this->hasMany(SubMenu::class,'main_meun_id');
  }
  
  public function getStatusAttribute($value)
  {
    return $value == 'enabled' ? 'مفعل' : 'غير مفعل';
  }
}