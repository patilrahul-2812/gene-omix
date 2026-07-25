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
        Schema::create('our_teams', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->string('name')->nullable();
            $table->text('profile_image')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->boolean('status')->default(1)->comment('0 for Inactive, 1 for Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_teams');
    }
};
