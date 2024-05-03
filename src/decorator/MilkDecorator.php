<?php

namespace App\decorator;

class MilkDecorator extends CoffeeDecorator
{
    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost() + 2;
    }

    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription() . ', milk';
    }
}