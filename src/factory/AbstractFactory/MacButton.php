<?php

namespace App\factory\AbstractFactory;

class MacButton implements Button
{
    public function paint(): string
    {
        return 'Render a button in Mac style';
    }
}