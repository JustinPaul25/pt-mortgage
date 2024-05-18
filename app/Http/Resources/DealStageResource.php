<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DealStageResource extends JsonResource
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
            'deal_id' => $this->deal_id,
            'deal_name' => $this->deal_name,
            'new_stage' => $this->new_stage,
            'date_updated' => $this->formatDate($this->date_updated)
        ];
    }

    private function formatDate($data) {
        $date = Carbon::parse($data);
        $formattedDate = $date->format('j F Y');

        return $formattedDate;
    }
}
