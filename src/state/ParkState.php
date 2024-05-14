<?php

namespace App\state;

class ParkState implements State
{
    public function changeSpeed(Car $car, int $speed): int
    {
        if ($speed > 0) {
            $car->setState(new FirstGearState());
        }

        return 0;
    }
}