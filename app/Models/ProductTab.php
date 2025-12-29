<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTab extends Model
{
    use HasFactory;

    // Add 'section' to fillable
    protected $fillable = ['product_id', 'title', 'section'];

    public function rows() {
        return $this->hasMany(ProductTabRow::class, 'tab_id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
