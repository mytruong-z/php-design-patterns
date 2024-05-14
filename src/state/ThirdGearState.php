<?php

namespace App\state;

class ThirdGearState implements State
{
    public function changeSpeed(Car $car, int $speed): int
    {
        if ($speed >= 30) {
            $car->setState(new FourthGearState());
            return $car->changeSpeed($speed);
        }

        if ($speed < 10) {
            $car->setState(new SecondGearState());
            return $car->changeSpeed($speed);
        }

        return 3;
    }
}