<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_name',
        'project_id',
        'coordinator',
        'email',
        'phone',
        'city',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
   
}
