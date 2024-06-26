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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('clientName', 100);
            $table->string('phone', 25);
            $table->string('email', 100);
            $table->string('website', 100);
            $table->boolean('active')->default(false);
            $table->foreignId('city_id')->constrained('cities');
            $table->string('image', 100);
            $table->softDeletes();
            $table->timestamps();
        }); // Fixed: added closing parenthesis here
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
