<?php

namespace App\decorator;

class SugarDecorator extends CoffeeDecorator
{
    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost() + 1;
    }

    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription() . ', sugar';
    }
}