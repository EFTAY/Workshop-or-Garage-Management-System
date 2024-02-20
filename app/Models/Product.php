<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
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
}
