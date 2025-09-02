<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Another example of making a new model can revolve around making the migration + factory in one command
//
// To create a migration and factory, simple type this: php artisan make:model --insert model name-- -mf
//
// The -mf represents a migration and factory in one command.



class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, relatedPivotKey:'post_id');
    }
}
