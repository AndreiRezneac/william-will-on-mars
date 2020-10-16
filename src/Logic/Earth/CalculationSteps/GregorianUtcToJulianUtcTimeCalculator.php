<?php


namespace App\Logic\Earth\CalculationSteps;


use App\Logic\Earth\EarthTime;
use App\Logic\Earth\EarthTimeCalculator;

// UTC : https://en.wikipedia.org/wiki/Coordinated_Universal_Time
// aka JD(utc)
class GregorianUtcToJulianUtcTimeCalculator implements EarthTime, EarthTimeCalculator
{
    public function calculate(float $gregorianUtcTimeWithMilliseconds): float
    {
        return $gregorianUtcTimeWithMilliseconds/self::MILLISECONDS_PER_DAY + self::JULIAN_DATE_AT_UNIX_EPOCH_START;
    }
}
