<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
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
            'slug' => $this->slug,
            'fiv' => $this->fiv,
            'gender' => $this->gender,
            'description' => $this->description,
            'colour' => $this->colour,
            'fee' => $this->fee,
            'fur' => $this->fur,
            'desexed' => $this->desexed,
            'temperament' => $this->temperament,
            'wormed' => $this->wormed,
            'size' => $this->size,
            'status' => $this->status,
            'age' => $this->age,
            'breed' => $this->breed,
            'image' => $this->image,
            'adopted_by' => $this->adopted_by,






        ];
    }
}
