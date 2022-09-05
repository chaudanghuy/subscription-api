<?php

namespace App\Http\Resources;

use App\Models\Client;
use App\Models\Website;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'website' => Website::where('id', $this->website_id)->first(),
            'subscriber' => Client::where('id', $this->client_id)->first()
        ];
    }
}
