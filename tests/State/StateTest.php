<?php

namespace State;

use App\state\Car;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    public function testState()
    {
        $car = new Car();

        $this->assertEquals(0, $car->changeSpeed(0)); // Park
        $this->assertEquals(1, $car->changeSpeed(3)); // First Gear
        $this->assertEquals(2, $car->changeSpeed(7)); // Second Gear
        $this->assertEquals(3, $car->changeSpeed(15)); // Third Gear
        $this->assertEquals(4, $car->changeSpeed(35)); // Fourth Gear
        $this->assertEquals(5, $car->changeSpeed(60)); // Fifth Gear
        $this->assertEquals(4, $car->changeSpeed(50)); // Fourth Gear
        $this->assertEquals(3, $car->changeSpeed(25)); // Third Gear
        $this->assertEquals(2, $car->changeSpeed(8)); // Second Gear
        $this->assertEquals(1, $car->changeSpeed(4)); // First Gear
        $this->assertEquals(0, $car->changeSpeed(0)); // Park
    }

}