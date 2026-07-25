<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, softDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'department_name',
        'status'
    ];

    public function ourteam()
    {
        return $this->hasMany(OurTeam::class);
    }
}
