<?php

namespace App\factory\AbstractFactory;

// Abstract product family
class WinCheckbox implements Checkbox
{
    public function paint(): string
    {
        return 'Render a checkbox in Windows style';
    }
}