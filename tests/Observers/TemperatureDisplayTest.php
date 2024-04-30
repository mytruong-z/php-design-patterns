<?php
namespace Observers;

use observer\Observers\TemperatureDisplay;
use observer\Subjects\WeatherStation;

require_once 'vendor/autoload.php';

class TemperatureDisplayTest extends \PHPUnit\Framework\TestCase
{
    public function testUpdate()
    {
        $weatherStation = new WeatherStation();
        $weatherStation->setTemperature(100);

        $display = new TemperatureDisplay();
        $display->update($weatherStation);

        // Assuming the display stores the temperature or has a method to get its last known temperature
        $this->assertEquals(25.0, $display->getLastKnownTemperature());

    }

}