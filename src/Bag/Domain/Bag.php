<?php

declare(strict_types=1);

namespace App\Bag\Domain;

use App\Player\Domain\Player;
use App\Pokemon\Domain\Pokemon;
use App\Shared\Domain\Entity;

final class Bag extends Entity
{
    protected Player $player;

    /**
     * @var Item[]
     */
    protected array $items;

    /**
     * @var Item[]
     */
    protected array $pokeballs;

    /**
     * @var Pokemon[]
     */
    protected array $party;

    public function addItem(Item $item)
    {
        if ($item->isPokeBall()) {
            $this->pokeballs[] = $item;
            return;
        }

        $this->items[] = $item;
    }

    public function addPokemonToParty(Pokemon $pokemon)
    {
        $this->party[] = $pokemon;
    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }

    /**
     * @param Player $player
     * @return Bag
     */
    public function setPlayer(Player $player): Bag
    {
        $this->player = $player;
        return $this;
    }
}