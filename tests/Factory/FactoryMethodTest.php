<?php

namespace Factory;

use App\factory\FactoryMethod\RoadLogistics;
use App\factory\FactoryMethod\SeaLogistics;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase {
    public function testRoadLogistics() {
        $roadLogistics = new RoadLogistics();
        $this->assertEquals(
            "Delivery plan: Deliver by land in a box",
            $roadLogistics->planDelivery()
        );
    }

    public function testSeaLogistics() {
        $seaLogistics = new SeaLogistics();
        $this->assertEquals(
            "Delivery plan: Deliver by sea in a container",
            $seaLogistics->planDelivery()
        );
    }
}