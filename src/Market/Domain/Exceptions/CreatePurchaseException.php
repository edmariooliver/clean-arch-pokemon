<?php

declare(strict_types=1);

namespace App\Market\Domain\Exceptions;

use App\Market\Domain\Cart;
use DomainException;
use Throwable;

class CreatePurchaseException extends DomainException
{
    public function __construct(Cart $cart, $message = "Não foi possível fazer a compra.", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}