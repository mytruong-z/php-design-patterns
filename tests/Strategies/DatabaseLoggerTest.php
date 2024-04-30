<?php
namespace Strategies;

use App\strategy\Logger;
use App\strategy\Strategies\DatabaseLogger;

require_once 'vendor/autoload.php';

class DatabaseLoggerTest extends \PHPUnit\Framework\TestCase
{
    private Logger $logger;

    public function setUp(): void
    {
        $this->logger = new Logger(new DatabaseLogger());
    }

    public function testLog(): void
    {
        $testMessage = 'Test message with database logger';

        ob_start();
        $this->logger->log($testMessage);
        $output = ob_get_clean();

        $expectedOutput = "Logging to database: $testMessage\n";
        $this->assertEquals($expectedOutput, $output);
    }
}