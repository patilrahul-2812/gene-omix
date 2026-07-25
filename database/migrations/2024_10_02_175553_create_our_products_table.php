<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('our_products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->string('product_name')->nullable();
            $table->text('image')->nullable();
            $table->text('alt_tag')->nullable();
            $table->text('description')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('brochure')->nullable();
            $table->text('seo_url')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('status')->default(1)->comment('0 for Inactive, 1 for Active');
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('schema_tag')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_products');
    }
};
