<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class SessionNotFundException extends Exception
{
    protected $message = 'Токен не найден';
    protected $code = Response::HTTP_NOT_FOUND;
}
