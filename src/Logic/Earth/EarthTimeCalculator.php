<?php


namespace App\Logic\Earth;


interface EarthTimeCalculator
{
    public function calculate(float $dateTime): float;
}
