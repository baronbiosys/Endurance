<?php

namespace Endurance;

class Point
{
    public $distance;
    public $heart_rate;
    public $latitude;
    public $longitude;
    public $speed;
    public $timestamp;
    public $cadence;
    public $power;
    public $altitude;
    
    public function __construct()
    {        
    }

    public function setElevation($elevation)
    {
        $this->altitude = (int) $elevation;
    }

    public function getElevation()
    {
        return $this->altitude;
    }

    public function setDistance($distance)
    {
        $this->distance = (float) $distance;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function setHeartRate($heartrate)
    {
        $this->heart_rate = (int) $heartrate;
    }

    public function getHeartRate()
    {
        return $this->heart_rate;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = (float) $latitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = (float) $longitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setSpeed($speed)
    {
        $this->speed = (float) $speed;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setTime(\DateTime $time)
    {      
        $this->timestamp = new \MongoDate($time->getTimestamp());
    }

    public function getTime()
    {
        return $this->timestamp;
    }

    public function getTimestamp()
    {
        return $this->timestamp->sec;
    }
    
    public function setCadence($cadence)
    {
        $this->cadence = (int) $cadence;
    }
    public function getCadence()
    {
        return $this->cadence;
    }
    
    public function setWatts($watts) 
    {
        $this->power = (int) $watts;
    }
    
    public function getWatts()
    {
        return $this->power;
    }
}
