<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'open_jobs' => $this->open_jobs,
            'title' => $this->title,
            'description' => $this->description,
            'categories' => $this->categories,
            'location' => $this->location,
            'experience' => $this->experience,
        ];
    }
}
