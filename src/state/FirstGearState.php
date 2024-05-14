<?php

namespace App\state;

class FirstGearState implements State
{
    public function changeSpeed(Car $car, int $speed): int
    {
        if ($speed >= 5) {
            $car->setState(new SecondGearState());
            return $car->changeSpeed($speed);
        }

        if ($speed === 0) {
            $car->setState(new ParkState());
            return $car->changeSpeed($speed);
        }

        return 1;
    }

}