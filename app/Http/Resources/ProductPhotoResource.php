<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'image' => URL::signedRoute('TitlePhotos.image',['TitlePhoto' => $this->id]),
            'product_id' => new ProductResource($this->Product),
        ];
    }
}
