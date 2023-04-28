<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory,Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\ProductCategoryFilter::class);
    }

    protected $fillable = [
        'name',
    ];
}
