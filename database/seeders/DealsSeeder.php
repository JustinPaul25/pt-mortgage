<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Deal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deal::truncate();

        $json = File::get("database/data/deals.json");
        $deals = json_decode($json);

        foreach ($deals as $key => $value) {
            Deal::create([
                "id" => $value->ID,
                "deal_id" => $value->{'Deal ID'},
                'deal_name' => $value->{'Deal name'},
                'deal_value' => $value->{'Deal value'},
                'lender' => $value->{'Lender'},
                'deal_owner' => $value->{'Deal owner'},
                'labels' => $value->{'Labels'},
                'date_new_lead' => $value->{'Date new lead'},
                'first_home_buyer' => $value->{'First Home Buyer'},
                'referrer' => $value->{'Referrer'},
                'owner_status' => $value->{'Owner Occupier / Investor'},
                'out_status' => $value->{'Purchase/Refinance/Equity out'},
                'date_submitted' => $value->{'Date submitted'} != null ? Carbon::parse($value->{'Date submitted'})->format('Y-m-d') : null,
                'date_conditional' => $value->{'Date Conditional'} != null ? Carbon::parse($value->{'Date Conditional'})->format('Y-m-d') : null,
                'date_formal' => $value->{'Date Formal'} != null ? Carbon::parse($value->{'Date Formal'})->format('Y-m-d') : null,
                'date_settled' => $value->{'Date settled'} != null ? Carbon::parse($value->{'Date settled'})->format('Y-m-d') : null,
                'date_paid' => $value->{'Date paid'} != null ? Carbon::parse($value->{'Date paid'})->format('Y-m-d') : null,
                'date_lost' => $value->{'Date lost'} != null ? Carbon::parse($value->{'Date lost'})->format('Y-m-d') : null,
                'current_stage' => $value->{'Current stage'},
                'employment_type' => $value->{'Employment type'}
            ]);
        }
    }
}
