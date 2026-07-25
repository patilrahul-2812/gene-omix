<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Blog extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'image',
        'alt_tag',
        'banner_image',
        'description',
        'seo_url',
        'sort_order',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'schema_tag',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('seo_url');
    }
}
