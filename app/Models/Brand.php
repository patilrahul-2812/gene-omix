<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'brand_name',
        'brand_logo',
        'brand_logo_alt_tag',
        'image',
        'image_alt_tag',
        'banner_image',
        'brand_description',
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
            ->generateSlugsFrom('brand_name')
            ->saveSlugsTo('seo_url');
    }

    public function ourproduct()
    {
        return $this->hasMany(OurProduct::class);
    }
}
