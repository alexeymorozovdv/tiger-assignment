<?php

namespace App\Services;

use App\Enums\ActionEnum;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ProxyService
{
    public static function send(ActionEnum $action, array $data): Response
    {
        $credentials = [
            'action' => $action->value,
            'token' => config('proxy.token')
        ];

        $params = array_merge($data, $credentials);

        return Http::get(config('proxy.url'), $params);
    }
}
