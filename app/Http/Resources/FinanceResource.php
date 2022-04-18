<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FinanceResource extends JsonResource
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
            'category' => new CategoryResource($this->subCategory->category),
            'sub_category' => new CategoryResource($this->subCategory),
            'member' => new MemberResource($this->member),
            'amount' => $this->amount,
            'comment' => $this->comment,
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
