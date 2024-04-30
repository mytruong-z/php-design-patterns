<?php
namespace App\strategy\Strategies;

interface ILoggerStrategy
{
    public function log($message): void;
}