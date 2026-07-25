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
        Schema::create('our_product_inquiries', function (Blueprint $table) {
            $table->id();
            $table->integer('ourproduct_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation_name')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_product_inquiries');
    }
};
