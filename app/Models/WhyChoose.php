<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChoose extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'about_pg_img',
        'our_speciality',
        'rotating_images',
        'why_are_we_different',
        'why_are_we_unique',
    ];
}
