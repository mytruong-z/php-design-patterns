<?php

namespace tests;

use observer\Interfaces\Observer;
use observer\Subjects\WeatherStation;
use TemperatureDisplay;

require_once 'src/observer/Subjects/WeatherStation.php';
require_once 'src/observer/Observers/TemperatureDisplay.php';
require_once 'vendor/autoload.php';

class WeatherStationTest extends \PHPUnit\Framework\TestCase
{
    public function testAttachDetachObserver()
    {
        $weatherStation = new WeatherStation();
        $observer = new TemperatureDisplay();

        $weatherStation->attach($observer);
        $this->assertCount(1, $weatherStation->getObservers());

        $weatherStation->detach($observer);
        $this->assertCount(0, $weatherStation->getObservers());
    }

    public function testNotifyObservers()
    {
        $weatherStation = new WeatherStation();
        $observer = $this->createMock(Observer::class);

        $observer->expects($this->once())
            ->method('update')
            ->with($this->equalTo($weatherStation));

        $weatherStation->attach($observer);
        $weatherStation->notify();
    }
}

