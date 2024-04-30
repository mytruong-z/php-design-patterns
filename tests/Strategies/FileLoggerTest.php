<?php
namespace Strategies;

use App\strategy\Logger;
use App\strategy\Strategies\FileLogger;

require_once 'vendor/autoload.php';

class FileLoggerTest extends \PHPUnit\Framework\TestCase
{
    private Logger $logger;

    public function setUp(): void
    {
        $this->logger = new Logger(new FileLogger());
    }

    public function testLog(): void
    {
        $testMessage = 'Test message with file logger';

        ob_start();
        $this->logger->log($testMessage);
        $output = ob_get_clean();

        $expectedOutput = "Logging to file: $testMessage\n";
        $this->assertEquals($expectedOutput, $output);
    }
}