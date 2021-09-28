<?php
 namespace App;

 class TodayHourly
 {
     private array $hourData;
     private int $currentHour;

     public function __construct(array $hourData, int $currentHour)
     {
         $this->hourData = $hourData;
         $this->currentHour = $currentHour;
     }

     public function getCurrentHourData(): array
     {
         $iconUrl = $this->hourData[$this->currentHour]['condition']['icon'];
         $temp = $this->hourData[$this->currentHour]['temp_c'];
         $wind = $this->hourData[$this->currentHour]['wind_kph'];

         return [$temp,$wind,$iconUrl];
     }

     public function getNextHourData(): ?array
     {
         if (isset($this->hourData[$this->currentHour + 1])) {
             $iconUrl = $this->hourData[$this->currentHour + 1]['condition']['icon'];
             $temp = $this->hourData[$this->currentHour + 1]['temp_c'];
             $wind = $this->hourData[$this->currentHour + 1]['wind_kph'];

             return [$temp,$wind,$iconUrl];
         }
         return null;
     }

     public function get2HoursData(): ?array
     {
         if (isset($this->hourData[$this->currentHour + 2])) {
             $iconUrl = $this->hourData[$this->currentHour + 2]['condition']['icon'];
             $temp = $this->hourData[$this->currentHour + 2]['temp_c'];
             $wind = $this->hourData[$this->currentHour + 2]['wind_kph'];

             return [$temp,$wind,$iconUrl];
         }
         return null;
     }

     public function get3HoursData(): ?array
     {
         if (isset($this->hourData[$this->currentHour + 3])) {
             $iconUrl = $this->hourData[$this->currentHour + 3]['condition']['icon'];
             $temp = $this->hourData[$this->currentHour + 3]['temp_c'];
             $wind = $this->hourData[$this->currentHour + 3]['wind_kph'];

             return [$temp,$wind,$iconUrl];
         }
         return null;
     }

     public function get4HoursData(): ?array
     {
         if (isset($this->hourData[$this->currentHour + 4])) {
             $iconUrl = $this->hourData[$this->currentHour + 4]['condition']['icon'];
             $temp = $this->hourData[$this->currentHour + 4]['temp_c'];
             $wind = $this->hourData[$this->currentHour + 4]['wind_kph'];

             return [$temp,$wind,$iconUrl];
         }
         return null;
     }


     public function getCurrentHour(): int
     {
         return $this->currentHour;
     }
 }