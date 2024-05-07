<?php

namespace App\factory\AbstractFactory;

// Concrete factory
class WinFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new WinButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new WinCheckbox();
    }
}