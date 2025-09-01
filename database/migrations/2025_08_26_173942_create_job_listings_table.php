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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            //create foreign id called employer_id
            //For the making of a table with the foreign id key, type the following command to create both
            //a model and a migration
            //php artisan make:model Employer -m
            //The unsignedBigInteger data type is called because when you call id methods within a migration
            //it creates a bigint column
            //
            //Another option is to use foreignIdfor which looks like it's a lot more fool-proof and convenient.
            //Great mix, huh?
            //
            // $table->unsignedBigInteger('employer_id');
            $table->foreignIdfor(\App\Models\Employer::class);
            $table->string('title');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
