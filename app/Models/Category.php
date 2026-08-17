<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Database Seeding:
    use HasFactory;

    // Mass Assignable Attributes:
    protected $fillable = [
        'name',
        'content'
    ];

    // Has Many Posts:
    public function posts() : HasMany {
        return $this->hasMany(Post::class); // Return all posts belonging to this Category.
    }
}