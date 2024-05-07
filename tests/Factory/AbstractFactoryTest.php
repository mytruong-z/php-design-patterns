<?php

namespace Factory;

use App\factory\AbstractFactory\MacFactory;
use App\factory\AbstractFactory\WinFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase {
    public function testWinFactory() {
        $factory = new WinFactory();

        $button = $factory->createButton();
        $this->assertEquals("Render a button in a Windows style", $button->paint());

        $checkbox = $factory->createCheckbox();
        $this->assertEquals("Check a checkbox in a Windows style", $checkbox->paint());
    }

    public function testMacFactory() {
        $factory = new MacFactory();

        $button = $factory->createButton();
        $this->assertEquals("Render a button in a MacOS style", $button->paint());

        $checkbox = $factory->createCheckbox();
        $this->assertEquals("Check a checkbox in a MacOS style", $checkbox->paint());
    }
}