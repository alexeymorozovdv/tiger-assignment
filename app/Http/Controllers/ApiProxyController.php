<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNumberRequest;
use App\Http\Requests\GetSmsRequest;
use App\Http\Requests\CancelNumberRequest;
use App\Http\Requests\GetStatusRequest;
use Illuminate\Support\Facades\Http;

class ApiProxyController extends Controller
{
    private $baseUrl = 'https://postback-sms.com/api/';
    private $apiToken = '5994c91001f57eea808aff11738d752a';

    public function getNumber(GetNumberRequest $request)
    {
        $response = Http::get($this->baseUrl, array_merge(
            $request->validated(),
            ['action' => 'getNumber', 'token' => $this->apiToken]
        ));

        return response()->json($response->json());
    }

    public function getSms(GetSmsRequest $request)
    {
        $response = Http::get($this->baseUrl, array_merge(
            $request->validated(),
            ['action' => 'getSms', 'token' => $this->apiToken]
        ));

        return response()->json($response->json());
    }

    public function cancelNumber(CancelNumberRequest $request)
    {
        $response = Http::get($this->baseUrl, array_merge(
            $request->validated(),
            ['action' => 'cancelNumber', 'token' => $this->apiToken]
        ));

        return response()->json($response->json());
    }

    public function getStatus(GetStatusRequest $request)
    {
        $response = Http::get($this->baseUrl, array_merge(
            $request->validated(),
            ['action' => 'getStatus', 'token' => $this->apiToken]
        ));

        return response()->json($response->json());
    }
}

