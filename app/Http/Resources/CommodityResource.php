<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommodityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'name' => $this->name,
            'amount' => $this->amount,
            'price' => $this->price,
            'introduction' => $this->introduction,
            'image_url' => $this->image_url,
        ];
    }
}
