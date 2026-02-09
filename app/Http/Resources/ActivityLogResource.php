<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityLogResource extends JsonResource
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
            'log_name' => $this->log_name,
            'description' => $this->description,
            'user' => $this->causer ? $this->causer : null,
            'subject_type' => $this->subject_type,
            'properties' => $this->properties,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
        ];
    }
}
