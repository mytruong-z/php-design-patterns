<?php

namespace App\factory\FactoryMethod;

// Creator class
abstract class Logistics
{
    abstract public function createTransport(): Transport;

    public function planDelivery(): string
    {
        return $this->createTransport()->deliver();
    }
}