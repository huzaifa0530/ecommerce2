<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'item_number',
        'description',
        'material',
        'item_size',
        'imprint_area',
        'other_specs',
        'is_special_offer',
        'is_popular',
        'special_price_before',
        'special_price_after',
        'bw_template_pdf',
        // NEW FIELDS
        'price_include_sh',
        'price_include_blank',
              'lead_time_repeat_blank',
        'lead_time_sh',
  
        'setup_charge_sh',
        'repeat_setup_sh',
        'MOQ_blank',

    ];

    protected $casts = [
        'other_specs' => 'array',
        'price_include_sh' => 'array',
        'lead_time_sh' => 'array',
        'setup_charge_sh' => 'array',
        'repeat_setup_sh' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function tabs()
    {
        return $this->hasMany(ProductTab::class);
    }

}
