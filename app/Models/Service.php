<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'service_name',
        'icon',
        'image',
        'image_alt_tag',
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
            ->generateSlugsFrom('service_name')
            ->saveSlugsTo('seo_url');
    }
}
