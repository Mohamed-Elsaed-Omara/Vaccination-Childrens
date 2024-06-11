<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChiledDosesResource extends JsonResource
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
            'name' => $this->name,
            'length' => $this->length,
            'weight' => $this->weight,
            'dateOfbirth' => $this->dateOfbirth,
            'gender' => $this->gender == 1 ? 'male' : 'female',
            'doses' => DoseResource::collection($this->whenLoaded('doses')),
        ];
    }
}
