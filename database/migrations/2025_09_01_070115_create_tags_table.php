<?php

use App\Models\User;
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
        /**
         * This is a pivot table. It's basically an intermediate level table designed to
         * manage many-to-many relationships between two other database tables.
         *
         * To review, there are three common relationships in Database relationships:
         *
         * 1. One to many
         * 2. One to one
         * 3. Many to many
         *
         * One table can have many relationships
         *
         * One table can have one relationship
         *
         * And many tables can have many relationships to many other tables (which is where pivot tables come in)
         *
         * You can also group these migrations in one migration file.
         *
         */
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(app\Models\Job::class);
            $table->foreignIdfor(app\Models\Tag::class);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
