<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CleaningRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = CleaningRequest::with('user')->latest()->get();
        return response()->json($requests);
    }

    public function updateStatus(Request $request, CleaningRequest $cleaningRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:in_progress,completed,canceled',
            'cancel_reason' => 'required_if:status,canceled'
        ]);

        $cleaningRequest->update($validated);

        return response()->json(['message'=>'Статус заявки успешно изменен']);
    }
}

