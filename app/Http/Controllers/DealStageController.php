<?php

namespace App\Http\Controllers;

use App\Http\Resources\DealStageResource;
use Inertia\Inertia;
use App\Models\DealStage;
use Illuminate\Http\Request;

class DealStageController extends Controller
{
    public function index()
    {
        return Inertia::render('DealStage/Index');
    }

    public function list(Request $request) {
        $search = $request->input('search');
        $deals = DealStage::query()
            ->when($search, function ($query, $search) {
                $query->where('deal_id', 'like', "%{$search}%")
                      ->orWhere('deal_name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return DealStageResource::collection($deals);
    }
}
