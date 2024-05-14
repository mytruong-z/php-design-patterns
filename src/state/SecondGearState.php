<?php

namespace App\state;

class SecondGearState implements State
{
    public function changeSpeed(Car $car, int $speed): int
    {
        if ($speed >= 10) {
            $car->setState(new ThirdGearState());
            return $car->changeSpeed($speed);
        }

        if ($speed < 5) {
            $car->setState(new FirstGearState());
            return $car->changeSpeed($speed);
        }

        return 2;
    }
}