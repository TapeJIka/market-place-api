<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory,Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\ProductTypeFilter::class);
    }

    protected $fillable = [
        'name',
        'product_category_id',
    ];

    public function product(){
        return $this->belongsTo(ProductCategory::class ,'product_category_id');
    }

}
