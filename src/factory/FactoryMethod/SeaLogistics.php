<?php

namespace App\factory\FactoryMethod;

class SeaLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Ship();
    }
}