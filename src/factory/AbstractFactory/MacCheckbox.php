<?php

namespace App\factory\AbstractFactory;

// Concrete product
class MacCheckbox implements Checkbox
{
    public function paint(): string
    {
        return 'Render a checkbox in Mac style';
    }
}