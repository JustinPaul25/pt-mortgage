<?php

namespace App\Http\Controllers;

use App\Http\Resources\DealResource;
use App\Models\Deal;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function index()
    {
        return Inertia::render('Leads/Index');
    }

    public function list(Request $request) {
        $search = $request->input('search');
        $deals = Deal::query()
            ->when($search, function ($query, $search) {
                $query->where('deal_id', 'like', "%{$search}%")
                      ->orWhere('deal_owner', 'like', "%{$search}%");
            })
            ->paginate(10);

        return DealResource::collection($deals);
    }
}
