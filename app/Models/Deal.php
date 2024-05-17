<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'deal_id',
        'deal_name',
        'deal_value',
        'lender',
        'deal_owner',
        'labels',
        'date_new_lead',
        'first_home_buyer',
        'referrer',
        'owner_status',
        'out_status',
        'date_submitted',
        'date_conditional',
        'date_formal',
        'date_settled',
        'date_paid',
        'date_lost',
        'current_stage',
        'employment_type',
    ];

    protected $dates = [
        'date_new_lead',
        'date_submitted',
        'date_conditional',
        'date_formal',
        'date_settled',
        'date_paid',
        'date_lost',
    ];

    protected $casts = [
        'date_new_lead' => 'datetime:Y F d g:i:s A',
    ];
}
