<?php

declare(strict_types=1);

namespace App\Player\Infra\Http;

use App\Player\Application\UseCases\Contracts\PlayerRepository;
use App\Shared\Application\Enum\ValidationErrorEnum;
use App\Shared\Exceptions\AppValidationException;
use App\Shared\Infra\Http\ActionBase;

class ProfileAction extends ActionBase
{
    private PlayerRepository $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function handle(): array
    {
        $playerId = $this->body['player_id'] ?? null;

        if (is_null($playerId)) {
            throw new AppValidationException(['player_id' => ValidationErrorEnum::NOT_FOUND]);
        }

        if (empty($playerId)) {
            throw new AppValidationException(['player_id' => ValidationErrorEnum::EMPTY]);
        }

        return $this->repository->profileInfo((int)$playerId);
    }
}