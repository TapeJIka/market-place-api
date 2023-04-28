<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'mark',
        'model',
        'country',
        'city',
        'price',
        'condition',
        'product_type_id',
    ];

    public function product(){
        return $this->belongsTo(ProductType::class ,'product_type_id');
    }

}
