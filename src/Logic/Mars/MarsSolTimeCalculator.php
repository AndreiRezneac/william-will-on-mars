<?php


namespace App\Logic\Mars;

class MarsSolTimeCalculator implements MarsTimeCalculator
{
    public function calculate(float $marsCoordinatedTime): float
    {
        return fmod($marsCoordinatedTime, 1);
    }
}
