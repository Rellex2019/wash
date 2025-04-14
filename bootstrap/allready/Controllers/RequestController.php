<?php

namespace App\Http\Controllers;

use App\Http\Requests\CleaningRequestRequest;
use App\Models\CleaningRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Auth::user()->cleaningRequests()->latest()->get();
        return response()->json($requests);
    }


    public function store(CleaningRequestRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        if ($data['service_type'] !== 'other') {
            $data['custom_service'] = null;
        }

        $requestData = CleaningRequest::create($data);

        return response()->json([
            'message' => 'Заявка успешно создана',
            'request' => $requestData
        ],200);
    }
}
