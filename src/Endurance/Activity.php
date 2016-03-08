<?php

namespace Endurance;

class Activity
{
    /**
     * The sport of the activity
     *
     * @var string
     */
    protected $sport;

    /**
     * The time when the ride started
     *
     * @var \DateTime
     */
    protected $startTime;

    /**
     * Points
     *
     * @var array
     */
    protected $points = array();

    /**
     * Lap summaries
     *
     * @var array
     */
    protected $laps = array();

    protected $totalTimeInSeconds = 0;
    protected $totalDistance = 0;
    protected $totalCalories = 0;    
    protected $totalElevationGain = 0;    
    protected $totalPower = 0;
    protected $maxPower = 0;
    protected $totalCadence = 0;
    protected $maxCadence = 0;    
    protected $totalSpeed = 0;
    protected $maxSpeed = 0;
    protected $totalHeartRate = 0;
    protected $maxHeartRate = 0;
    
    public function setSport($sport)
    {
        $this->sport = $sport;
    }

    public function getSport()
    {
        return $this->sport;
    }

    public function setStartTime(\DateTime $startTime)
    {
        $this->startTime = $startTime;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function addPoint(Point $point)
    {
        if (!empty($point->getCadence())) {
            $this->totalCadence += $point->getCadence();
            $this->maxCadence = max($this->maxCadence, $point->getCadence());
        }
                
        if (!empty($point->getElevation())) {
            $last_index = count($this->points) - 1;
            if ($last_index >= 0) {
                $last_point = $this->points[$last_index];
                if (isset($last_point['elevation']) && $point->getElevation() > $last_point['elevation'])
                    $this->totalElevationGain += $point->getElevation() - $last_point['elevation'];
            }
        }
        
        if (!empty($point->getHeartRate())) {
            $this->totalHeartRate += $point->getHeartRate();
            $this->maxHeartRate = max($this->maxHeartRate, $point->getHeartRate());
        }
        
        if (!empty($point->getSpeed())) {
            $this->totalSpeed += $point->getSpeed();
            $this->maxSpeed = max($this->maxSpeed, $point->getSpeed());
        }
        
        if (!empty($point->getWatts())) {
            $this->totalPower += $point->getWatts();
            $this->maxPower = max($this->maxPower, $point->getWatts());
        }
        
        $this->points[] = (array) $point;        
    }

    public function setPoints(array $points)
    {
        $this->points = array();
        foreach ($points as $point) {
            $this->addPoint($point);
        }
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function addLap(Lap $lap)
    {
        $this->laps[] = $lap;
    }

    public function setLaps(array $laps)
    {
        $this->laps = array();
        foreach ($laps as $lap) {
            $this->addLap($lap);
        }
    }

    public function getLap($index)
    {
        return $this->laps[$index];
    }

    public function setCalories($calories)
    {
        $this->totalCalories = $calories;
    }

    public function getCalories()
    {
        return $this->totalCalories;
    }

    public function getLaps()
    {
        return $this->laps;
    }

    public function getTracks($lapNode)
    {
        $data = array();
        foreach ($lapNode->Track as $track) {
            $data = array_combine($data,(array)$track);
        }
        return $data;
    }
    
    public function setTotalTime($time) 
    {
        $this->totalTimeInSeconds = $time;
    }
    
    public function getTotalTime() 
    {
        return $this->totalTimeInSeconds;
    }
    
    public function setTotalDistance($distance) 
    {
        $this->totalDistance = (float) $distance;
    }
    
    public function getTotalDistance() 
    {
        return $this->totalDistance;
    }
    
    public function getMaxPower() 
    {
        return $this->maxPower;       
    }
    
    public function getAvgPower()
    {
        $avg = 0;
        
        if (count($this->points)) {
            $avg = $this->totalPower / count($this->points);
        }
        
        return $avg;
    }
    
    public function getTotalElevationGain()
    {
        return $this->totalElevationGain;
    }
    
    public function getMaxCadence()
    {
        return $this->maxCadence;       
    }
    
    public function getAvgCadence()
    {
        $avg = 0;
        
        if (count($this->points)) {
            $avg = $this->totalCadence / count($this->points);
        }
        
        return $avg;
    }
    
    public function getMaxSpeed()
    {
        return $this->maxSpeed;       
    }
    
    public function getAvgSpeed()
    {
        $avg = 0;
        
        if (count($this->points)) {
            $avg = $this->totalSpeed / count($this->points);
        }
        
        return $avg;
    }
    
    public function getMaxHeartRate()
    {
        return $this->maxHeartRate;       
    }
    
    public function getAvgHeartRate()
    {
        $avg = 0;
        
        if (count($this->points)) {
            $avg = $this->totalHeartRate / count($this->points);
        }
        
        return $avg;
    }
}
