<?php

class CharacterClass extends Model
{
    protected $hitPoints = 0;

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function setHitPoints(int $hitPoints): void
    {
        $this->hitPoints = $hitPoints;
    }
}
