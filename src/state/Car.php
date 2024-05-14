<?php

namespace App\state;

class Car
{
    private State $state;

    public function __construct()
    {
        $this->state = new ParkState();
    }

    public function changeSpeed(int $speed): int
    {
        return $this->state->changeSpeed($this, $speed);
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }
}