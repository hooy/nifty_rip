<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ColorResource as ColorResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'slug' => $this->slug,
            'price' => [
                'amount' => $this->price,
                'currency' => $this->currency->iso_code,
                'currency_symbol' => $this->currency->symbol,
            ],
            # consider what is the best for your situation
            # separate resource or just plain name
            # new ColorResource()
            'color' => $this->color->name,
            'size' => $this->size->name,
            'type' => $this->type->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
