<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Http\Resources\Json\JsonResource;

class DealResource extends JsonResource
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
            'deal_value' => Number::currency($this->deal_value, 'USD'),
            'lender' => $this->lender,
            'deal_owner' => $this->deal_owner,
            'labels' => $this->labels,
            'date_new_lead' => $this->formatDateTime($this->date_new_lead),
            'first_home_buyer' => $this->first_home_buyer,
            'referrer' => $this->referrer,
            'owner_status' => $this->owner_status,
            'out_status' => $this->out_status,
            'date_submitted' => $this->formatDate($this->date_submitted),
            'date_conditional' =>$this->formatDate($this->date_conditional),
            'date_formal' => $this->formatDate($this->date_formal),
            'date_settled'=> $this->formatDate($this->date_settled),
            'date_paid' => $this->formatDate($this->date_paid),
            'date_lost' => $this->formatDate($this->date_lost),
            'current_stage' => $this->current_stage,
            'employment_type' => $this->employment_type,
        ];
    }

    private function formatDateTime($data) {
        $date = Carbon::parse($data);
        $formattedDate = $date->format('j F Y g:i:s A');

        return $formattedDate;
    }

    private function formatDate($data) {
        $date = Carbon::parse($data);
        $formattedDate = $date->format('j F Y');

        return $formattedDate;
    }
}
