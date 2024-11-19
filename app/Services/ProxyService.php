<?php

namespace App\Services;

use App\Enums\ActionEnum;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ProxyService
{
    public static function send(ActionEnum $action, array $data): Response
    {
        $url = config('proxy.url');
        $apiToken = config('proxy.token');
        $params = array_merge($data, ['action' => $action->value, 'token' => $apiToken]);

        return Http::get($url, $params);
    }
}
