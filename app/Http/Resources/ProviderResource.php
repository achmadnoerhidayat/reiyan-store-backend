<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'driver' => $this->driver,
            'payload' => $this->masked_payload,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('d M Y H:i'),
            'updated_at' => $this->updated_at->format('d M Y H:i'),
        ];
    }
}
