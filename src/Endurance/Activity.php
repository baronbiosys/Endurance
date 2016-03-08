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

    protected $totalTimeInSeconds;
    protected $totalDistance;
    protected $totalCalories;
    protected $totalPower = 0;
    protected $avgPower = 0;
    protected $maxPower = 0;
    protected $maxCadence;
    protected $avgCadence;
    
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
        if (!empty($point->cadence)) {
                                    
        }
        
        if (!empty($point->distance)) {
            
        }
        
        if (!empty($point->elevation)) {
//            $elevation_gain += $value - $last_altitude;
        }
        
        if (!empty($point->heartrate)) {
            
        }
        
        if (!empty($point->speed)) {
            
        }
        
        if (!empty($point->watts)) {
            $this->totalPower += $point->watts;
            $this->maxPower = max($this->maxPower, $point->watts);
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
}
