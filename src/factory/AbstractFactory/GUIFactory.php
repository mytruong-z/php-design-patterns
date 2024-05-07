<?php

namespace App\factory\AbstractFactory;

// Abstract factory interface
interface GUIFactory
{
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}