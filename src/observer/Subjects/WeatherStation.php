<?php
namespace observer\Subjects;

use observer\Interfaces\Subject;
use observer\Interfaces\Observer;

class WeatherStation implements Subject
{
    private float $temperature;
    private array $observers = [];

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function setTemperature(float $temperature): void {
        $this->temperature = $temperature;
        $this->notify();
    }

    public function getTemperature(): float {
        return $this->temperature;
    }

    public function getObservers(): array
    {
        return $this->observers;
    }
}
