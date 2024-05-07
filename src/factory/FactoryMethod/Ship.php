<?php

namespace App\factory\FactoryMethod;

// Concrete implementation
class Ship implements Transport
{
    public function deliver(): string
    {
        return 'Deliver by sea in a container';
    }
}