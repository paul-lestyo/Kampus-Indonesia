<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
			'judul' => $this->title,
            'deskripsi' => $this->content,
            'created_at' => $this->created_at->format("d/m/Y"),
			'updated_at' => $this->created_at->format("d/m/Y"),
        ];
    }
}
