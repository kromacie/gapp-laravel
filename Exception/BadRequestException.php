<?php

namespace Ipaas\Gapp\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BadRequestException extends Exception
{
    public function __construct(
        $message = 'Invalid request',
        int $code = Response::HTTP_BAD_REQUEST,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return irenderException($this);
    }
}
