<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductTypeFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'ilike', "%$name%");
    }

    public function ProductCategory($product_category_id)
    {
        return $this->where('product_category_id', $product_category_id);
    }
}
