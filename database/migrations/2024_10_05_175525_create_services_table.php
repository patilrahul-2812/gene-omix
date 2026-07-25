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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name')->nullable();
            $table->text('icon')->nullable();
            $table->text('image')->nullable();
            $table->text('image_alt_tag')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('description')->nullable();
            $table->text('seo_url')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('status')->default(1)->comment('0 for Inactive, 1 for Active');
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('schema_tag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
