<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChiledDosesResource;
use App\Models\Child;
use App\Models\Dose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ChildController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        $children = $user->childrens()->with('doses')->get();

        return Response::json(ChiledDosesResource::collection($children));
    }

    
}
