<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
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

    public function description($description)
    {
        return $this->where('description', 'ilike', "%$description%");
    }

    public function mark($mark)
    {
        return $this->where('mark','ilike', "%$mark%");
    }

    public function model($model)
    {
        return $this->where('model','ilike', "%$model%");
    }

    public function date($date)
    {
        return $this->where('date', $date);
    }

    public function country($country)
    {
        return $this->where('country','ilike', "%$country%");
    }

    public function city($city)
    {
        return $this->where('city','ilike', "%$city%");
    }

    public function PriceFrom($price)
    {
        return $this->where('price', '>=', $price);
    }

    public function PriceTo($price)
    {
        return $this->where('price','<=', "%$price%");
    }

    public function condition($condition)
    {
        return $this->where('condition', $condition);
    }

    public function ProductType($product_type_id)
    {
        return $this->where('product_type_id', $product_type_id);
    }

}
