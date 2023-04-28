<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
            'mark'=> $this->mark,
            'model'=> $this->model,
            'date' => $this->date,
            'country'=> $this->country,
            'city'=> $this->city,
            'price'=> $this->price,
            'condition'=> $this->condition,
            'product_type_id'=> $this->product_type_id,
        ];
    }
}
