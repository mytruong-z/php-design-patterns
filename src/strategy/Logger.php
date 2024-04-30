<?php
namespace App\strategy;

use App\strategy\Strategies\ILoggerStrategy;

class Logger
{
    private ILoggerStrategy $logger;

    public function __construct(ILoggerStrategy $logger)
    {
        $this->logger = $logger;
    }

    public function log($message): void
    {
        $this->logger->log($message);
    }
}
