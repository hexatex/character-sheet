<?php

class Race extends Model
{
    protected $speed = 30;

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }
}
