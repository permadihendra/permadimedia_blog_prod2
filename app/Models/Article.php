<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

     // Scope search to add search functionality in eloquent query
     public function scopeSearch($query, $value){
        $query->where('title', 'like', "%{$value}%")->orWhere('category', 'like', "%{$value}%");
    }
}
