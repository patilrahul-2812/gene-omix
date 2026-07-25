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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('about_desc')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->text('experience_img')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('distribution_network_img')->nullable();
            $table->text('our_clients')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
