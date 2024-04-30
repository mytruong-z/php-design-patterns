<?php
namespace App\strategy\Strategies;

class DatabaseLogger implements ILoggerStrategy
{
    public function log($message): void
    {
        echo "Logging to database: $message\n";
    }

}