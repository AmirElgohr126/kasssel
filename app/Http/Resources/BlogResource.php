<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title, // The accessor should automatically use the app locale
            'description' => $this->description,
            'categories' => $this->categories,
            'image' => $this->image ? retriveMedia(). $this->image : '',
            'details' => BlogDetailResource::collection($this->whenLoaded('details')),
            // Assuming you have a DetailResource to handle detail translations similarly
        ];

    }
}
