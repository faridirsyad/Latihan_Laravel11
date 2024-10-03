<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;


class Post extends Model
{
    use HasFactory;
    
    protected $with = ['author', 'category'];  
    
    // method relasi
    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    // searching
    public function scopeSearch(Builder $query, array $filters) : void
    {
       $query->when(
        $filters['search'] ?? false, 
        fn ($query, $search) =>
        $query->where('title', 'like', '%' . $search. '%')
       );

       $query->when(
        $filters['category'] ?? false,
        fn ($query, $category) => 
        $query->whereHas('category', fn($query) => $query->where('slug', $category))
       );

       $query->when(
        $filters['author'] ?? false,
        fn ($query, $author) => 
        $query->whereHas('author', fn($query) => $query->where('username', $author))
       );
    }
}

