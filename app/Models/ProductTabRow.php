<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTabRow extends Model
{
    use HasFactory;

    protected $fillable = ['tab_id', 'label', 'value'];

    public function tab() {
        return $this->belongsTo(ProductTab::class, 'tab_id');
    }
    public function cells() {
    return $this->hasMany(ProductTabCell::class, 'row_id');
}

}
