<?php

namespace Decorators;

use App\decorator\MilkDecorator;
use App\decorator\SimpleCoffee;
use App\decorator\SugarDecorator;
use PHPUnit\Framework\TestCase;

class CoffeeTest extends TestCase
{
    public function testSimpleCoffee()
    {
        $simpleCoffee = new SimpleCoffee();
        $this->assertEquals(10, $simpleCoffee->getCost());
        $this->assertEquals('Simple coffee', $simpleCoffee->getDescription());
    }

    public function testCoffeeWithMilk()
    {
        $simpleCoffee = new SimpleCoffee();
        $milkCoffee = new MilkDecorator($simpleCoffee);
        $this->assertEquals(12, $milkCoffee->getCost());
        $this->assertEquals('Simple coffee, milk', $milkCoffee->getDescription());
    }

    public function testCoffeeWithMilkAndSugar()
    {
        $simpleCoffee = new SimpleCoffee();
        $milkCoffee = new MilkDecorator($simpleCoffee);
        //double milk
        $milkAndSugarCoffee = new SugarDecorator($milkCoffee);
        $milkAndSugarCoffee2 = new SugarDecorator($milkAndSugarCoffee);

        $this->assertEquals(14, $milkAndSugarCoffee2->getCost());
        $this->assertEquals('Simple coffee, milk, sugar', $milkAndSugarCoffee->getDescription());
    }
}