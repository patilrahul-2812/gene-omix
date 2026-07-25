<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'district_id',
        'city_name',
        'pincode',
        'sort_order',
        'status',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
