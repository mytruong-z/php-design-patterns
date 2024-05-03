<?php

namespace App\decorator;

class CoffeeDecorator implements Coffee
{
    protected Coffee $decoratedCoffee;

    public function __construct(Coffee $coffee)
    {
        $this->decoratedCoffee = $coffee;
    }

    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost();
    }

    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription();
    }

}