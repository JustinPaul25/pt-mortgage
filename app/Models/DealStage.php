<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'deal_id',
        'deal_name',
        'new_stage',
        'date_updated'
    ];
}
