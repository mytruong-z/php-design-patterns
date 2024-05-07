<?php

namespace App\factory\FactoryMethod;

// Concrete implementation
class Truck implements Transport
{
    public function deliver(): string
    {
        return 'Deliver by land in a box';
    }
}