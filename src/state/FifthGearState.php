<?php

namespace App\state;

class FifthGearState implements State
{
    public function changeSpeed(Car $car, int $speed): int
    {
        if ($speed < 55) {
            $car->setState(new FourthGearState());
            return $car->changeSpeed($speed);
        }

        return 5;
    }
}