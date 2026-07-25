<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'country_id',
        'state_name',
        'sort_order',
        'status'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
