<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'about_desc',
        'years_of_experience',
        'experience_img',
        'vision',
        'mission',
        'distribution_network_img',
        'our_clients',
        'core_values',
    ];
}
