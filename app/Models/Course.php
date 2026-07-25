<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'course_name',
        'description',
        'module',
        'image',
        'sort_order',
        'status',
        'is_popular_or_top_course',
        'seo_url',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'schema_tag',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
