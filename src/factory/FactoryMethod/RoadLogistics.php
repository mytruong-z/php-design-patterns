<?php

namespace App\factory\FactoryMethod;

// Concrete creator
class RoadLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Truck();
    }
}