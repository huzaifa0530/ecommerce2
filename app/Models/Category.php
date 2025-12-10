<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id'];

    // Self-referencing relationship for subcategories
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
