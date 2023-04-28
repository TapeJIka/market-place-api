<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function firstName($first_name)
    {
        return $this->where('first_name', 'ilike', "%$first_name%");
    }

    public function lastName($last_name)
    {
        return $this->where('last_name', 'ilike', "%$last_name%");
    }

    public function phoneNumber($phone_number)
    {
        return $this->where('phone_number', 'ilike', "%$phone_number%");
    }

    public function email($email)
    {
        return $this->where('email', 'ilike', "%$email%");
    }
}
