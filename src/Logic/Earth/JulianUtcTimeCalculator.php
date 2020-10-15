<?php


namespace App\Logic\Earth;


// UTC : https://en.wikipedia.org/wiki/Coordinated_Universal_Time
// aka JD(utc)
class JulianUtcTimeCalculator implements EarthTime, EarthTimeCalculator
{
    public function calculate(float $gregorianUtcTimeWithMilliseconds): float
    {
        return $gregorianUtcTimeWithMilliseconds/self::MILLISECONDS_PER_DAY + self::JULIAN_DATE_AT_UNIX_EPOCH_START;
    }
}
