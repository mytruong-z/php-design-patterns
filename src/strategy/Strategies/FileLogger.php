<?php
namespace App\strategy\Strategies;

class FileLogger implements ILoggerStrategy
{
    public function log($message): void
    {
        echo "Logging to file: $message\n";
    }
}