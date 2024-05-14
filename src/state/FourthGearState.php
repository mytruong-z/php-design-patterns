<?php

namespace App\state;

class FourthGearState implements State
{
    public function changeSpeed(Car $car, int $speed): int
    {
        if ($speed >= 55) {
            $car->setState(new FifthGearState());
            return $car->changeSpeed($speed);
        }

        if ($speed < 30) {
            $car->setState(new ThirdGearState());
            return $car->changeSpeed($speed);
        }

        return 4;
    }

}