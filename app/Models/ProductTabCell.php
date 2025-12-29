<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTabCell extends Model
{
    use HasFactory;

    protected $fillable = ['row_id','column_name','value'];

    public function row() {
        return $this->belongsTo(ProductTabRow::class,'row_id');
    }
}
