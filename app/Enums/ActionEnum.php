<?php

namespace App\Enums;

enum ActionEnum: string
{
    case GET_NUMBER = 'getNumber';
    case GET_SMS = 'getSms';
    case CANCEL_NUMBER = 'cancelNumber';
    case GET_STATUS = 'getStatus';
}
