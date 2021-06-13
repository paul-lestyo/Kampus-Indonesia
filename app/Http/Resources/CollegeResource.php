<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MajorResource;

class CollegeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $resource = [
			'id' => $this->id,
			'name' => $this->name,
			'majors' => MajorResource::collection($this->whenLoaded('majors')),
            'created_at' => $this->created_at->format("d/m/Y"),
			'updated_at' => $this->created_at->format("d/m/Y"),
		];

		if(is_numeric($this->majors_count)) {
			$resource['majors_count'] = $this->majors_count;
		}

		return $resource;
    }
}
