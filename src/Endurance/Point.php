<?php

namespace Endurance;
// use MongoDB\BSON\UTCDateTime as MongoDate;
//use MongoDate;
use Carbon\Carbon;

class Point
{
    public $dist;
    public $hr;
    public $lat;
    public $lng;
    public $spd;
    public $ts;
    public $cad;
    public $power;
    public $alt;
    
    public function __construct()
    {        
    }

    public function setElevation($elevation)
    {
        $this->alt = (int) $elevation;
    }

    public function getElevation()
    {
        return $this->alt;
    }

    public function setDistance($distance)
    {
        $this->dist = (float) $distance;
    }

    public function getDistance()
    {
        return $this->dist;
    }

    public function setHeartRate($heartrate)
    {
        $this->hr = (int) $heartrate;
    }

    public function getHeartRate()
    {
        return $this->hr;
    }

    public function setLatitude($latitude)
    {
        $this->lat = (float) $latitude;
    }

    public function getLatitude()
    {
        return $this->lat;
    }

    public function setLongitude($longitude)
    {
        $this->lng = (float) $longitude;
    }

    public function getLongitude()
    {
        return $this->lng;
    }

    public function setSpeed($speed)
    {
        $this->spd = (float) $speed;
    }

    public function getSpeed()
    {
        return $this->spd;
    }

    public function setTime(Carbon $time)
    {      
        $this->ts = new Carbon;
	$this->ts = $time;
       //$this->ts = new MongoDate($time->getTimestamp() * 1000);
    }

    public function getTime()
    {
        return $this->ts;
    }

    public function getTimestamp()
    {
        return $this->ts->getTimestamp();
    }
    
    public function setCadence($cadence)
    {
        $this->cad = (int) $cadence;
    }
    public function getCadence()
    {
        return $this->cad;
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
