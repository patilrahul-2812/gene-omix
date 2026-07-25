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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->string('title1_color')->nullable();
            $table->string('title2')->nullable();
            $table->string('title2_color')->nullable();
            $table->string('image')->nullable();
            $table->string('alt_tag')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('status')->default(1)->comment('0 for Inactive, 1 for Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
