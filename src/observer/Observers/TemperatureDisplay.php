<?php
namespace observer\Observers;

use observer\Interfaces\Observer;
use observer\Interfaces\Subject;
use observer\Subjects\WeatherStation;
class TemperatureDisplay implements Observer
{
    private float $lastKnownTemperature = 0.0;
    public function update(Subject $subject): void
    {
        if ($subject instanceof WeatherStation) {
            $this->lastKnownTemperature = $subject->getTemperature();
            echo "New temperature: " . $subject->getTemperature() . "°C\n";
        }
    }

    public function getLastKnownTemperature(): float
    {
        return $this->lastKnownTemperature;
    }

}