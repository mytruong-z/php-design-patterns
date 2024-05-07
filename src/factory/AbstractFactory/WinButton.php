<?php

namespace App\factory\AbstractFactory;

// Abstract product family
class WinButton implements Button
{
    public function paint(): string
    {
        return 'Render a button in Windows style';
    }
}
