<?php

namespace App\Http\Controllers;

use App\Enums\ActionEnum;
use App\Http\Requests\GetNumberRequest;
use App\Http\Requests\GetSmsRequest;
use App\Http\Requests\CancelNumberRequest;
use App\Http\Requests\GetStatusRequest;
use App\Services\ProxyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ApiProxyController extends Controller
{
    public function getNumber(GetNumberRequest $request): JsonResponse
    {
        try {
            $response = ProxyService::send(ActionEnum::GET_NUMBER, $request->all());

            return response()->json($response->json());
        } catch (\Throwable $e) {
            Log::channel('proxy')->error($e->getFile() . PHP_EOL . $e->getLine() . PHP_EOL . $e->getMessage());

            return response()->json(json_encode([
                "code" => "error",
                "message" => "Ошибка"
            ]));
        }
    }

    public function getSms(GetSmsRequest $request): JsonResponse
    {
        try {
            $response = ProxyService::send(ActionEnum::GET_SMS, $request->all());

            return response()->json($response->json());
        } catch (\Throwable $e) {
            Log::channel('proxy')->error($e->getFile() . PHP_EOL . $e->getLine() . PHP_EOL . $e->getMessage());

            return response()->json(json_encode([
                "code" => "error",
                "message" => "Ошибка"
            ]));
        }
    }

    public function cancelNumber(CancelNumberRequest $request): JsonResponse
    {
        try {
            $response = ProxyService::send(ActionEnum::CANCEL_NUMBER, $request->all());

            return response()->json($response->json());
        } catch (\Throwable $e) {
            Log::channel('proxy')->error($e->getFile() . PHP_EOL . $e->getLine() . PHP_EOL . $e->getMessage());

            return response()->json(json_encode([
                "code" => "error",
                "message" => "Ошибка"
            ]));
        }
    }

    public function getStatus(GetStatusRequest $request): JsonResponse
    {
        try {
            $response = ProxyService::send(ActionEnum::GET_STATUS, $request->all());

            return response()->json($response->json());
        } catch (\Throwable $e) {
            Log::channel('proxy')->error($e->getFile() . PHP_EOL . $e->getLine() . PHP_EOL . $e->getMessage());

            return response()->json(json_encode([
                "code" => "error",
                "message" => "Ошибка"
            ]));
        }
    }
}

