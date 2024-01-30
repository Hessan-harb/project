<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TaskResources;
class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'tasks'=>TaskResource::collection($this->whenLoaded('tasks')),
            'member'=>UserResource::collection($this->whenLoaded('members')),
            'created_at'=>$this->created_at,
            'creator_id'=>$this->creator_id,
            'creator_name'=>$this->creator->name,
            'creator_email'=>$this->creator->email,
        ];
    }
}
