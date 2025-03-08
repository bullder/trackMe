<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function track(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'uid' => 'required|string',
            'vid' => 'required|string',

            'agent' => 'required|string',
            'language' => 'required|string',

            'url' => 'required|string'
        ]);

        Visitor::create([
            'uid' => $validated['uid'],
            'vid' => $validated['vid'],
            'agent' => $validated['agent'],
            'language' => $validated['language'],
            'url' => $validated['url'],
            'site' => parse_url($validated['url'], PHP_URL_HOST),
            'ip' => $request->getClientIp(),
        ]);

        return response()->json([], 201);
    }
}
