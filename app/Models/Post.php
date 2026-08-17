<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    // Database Seeding:
    use HasFactory;

    // Mass Assignable Attributes:
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id'
    ];

    // Belongs to a Category:
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class); // Return the Category this post belongs to.
    }

    // Belongs to a User:
    public function user() : BelongsTo {
        return $this->belongsTo(User::class); // Return the User this post belongs to.
    }
}