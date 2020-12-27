<?php

declare(strict_types=1);

namespace App\Market\Domain\Exceptions;

use DomainException;
use Throwable;

class InsufficientMoneyException extends DomainException
{
    public function __construct($message = "Jogador não tem dinheiro suficiente para esta compra", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}