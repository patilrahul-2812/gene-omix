<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurProduct extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'brand_id',
        'product_name',
        'image',
        'alt_tag',
        'description',
        'banner_image',
        'brochure',
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
            ->generateSlugsFrom('product_name')
            ->saveSlugsTo('seo_url');
    }
}
