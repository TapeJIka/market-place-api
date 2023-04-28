<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\ProductFilter::class);
    }

    protected $fillable = [
        'name',
        'description',
        'mark',
        'model',
        'date',
        'country',
        'city',
        'price',
        'condition',
        'product_type_id',
    ];

    public function productType(){
        return $this->belongsTo(ProductType::class ,'product_type_id');
    }

}
