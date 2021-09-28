<?php

namespace App;

class DayWeather
{
    private string $date;
    private float $maxTemp;
    private float $minTemp;
    private float $maxWind;
    private string $iconUrl;

    public function __construct(string $date, float $maxTemp, float $minTemp, float $maxWind, string $iconUrl)
    {

        $this->date = $date;
        $this->maxTemp = $maxTemp;
        $this->minTemp = $minTemp;
        $this->maxWind = $maxWind;
        $this->iconUrl = $iconUrl;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    public function getMaxTemp(): float
    {
        return $this->maxTemp;
    }

    public function getMaxWind(): float
    {
        return $this->maxWind;
    }

    public function getMinTemp(): float
    {
        return $this->minTemp;
    }
}