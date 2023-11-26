<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function scopeFilters($query, array $filters)
    {
        // filter posts by title
        $query->when($filters['search'] ?? false, function ($query, string $search) {
            $query->where(
                fn ($query) => $query->where('title', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, function ($query, string $category) {
            $query->whereHas(
                'category',
                fn ($query) => $query->whereTitle($category)
            );
        });
        // // filter posts by category title
        // $query->when($filters['category'] ?? false, function ($query, string $category) {
        //     $query->whereExists(function ($query) use ($category) {
        //         $query->from('post_categories')
        //             ->whereColumn('post_categories.id', 'posts.category_id')
        //             ->where('category.title', $category);
        //     });
        // });
    }
}
