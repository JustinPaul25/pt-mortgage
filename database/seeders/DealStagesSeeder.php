<?php

namespace Database\Seeders;

use App\Models\DealStage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DealStagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DealStage::truncate();

        $json = File::get("database/data/deal_stage.json");
        $deals = json_decode($json);

        foreach ($deals as $key => $value) {
            DealStage::create([
                'id' => $value->{'ID'},
                'deal_id' => $value->{'Deal-ID'},
                'deal_name' => $value->{'Deal name'},
                'new_stage'  => $value->{'New-stage'},
                'date_updated' => $value->{'Date'}
            ]);
        }
    }
}
