<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Realations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }
}
