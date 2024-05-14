<?php

namespace App\state;

interface State
{
    public function changeSpeed(Car $car, int $speed): int;

}