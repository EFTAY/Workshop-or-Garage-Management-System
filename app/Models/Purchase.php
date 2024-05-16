<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];
    // For Additonal Relationship
    public function supplier()
    {
        try {
            return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function unit()
    {
        try {
            return $this->belongsTo(Unit::class, 'unit_id', 'id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function category()
    {
        try {
            return $this->belongsTo(Category::class, 'category_id', 'id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function product()
    {
        try {
            return $this->belongsTo(Product::class, 'product_id', 'id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
