<?php

namespace App\Http\Controllers;

use App\Http\Resources\DealResource;
use App\Models\Deal;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Leads/Index', [
            'deals' => DealResource::collection(
                Deal::latest()->paginate(10)
            )
        ]);
    }
}
