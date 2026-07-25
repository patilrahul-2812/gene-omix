<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title1',
        'title1_color',
        'title2',
        'title2_color',
        'image',
        'alt_tag',
        'sort_order',
        'status',
    ];
}
