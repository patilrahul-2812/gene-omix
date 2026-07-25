<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'designation_id', 
        'name', 
        'profile_image', 
        'facebook', 
        'linkedin', 
        'instagram', 
        'email', 
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}