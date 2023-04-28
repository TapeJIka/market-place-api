<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductCategoryFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function sort($order)
    {
        $this->orderBy($order[0], $order[1]);
    }

    public function name($name)
    {
        return $this->where('name', 'ilike', "%$name%");
    }
}
