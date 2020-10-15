<?php


namespace App\Logic\Mars;


class MarsCoordinatedTimeCalculator implements MarsTimeCalculator
{
    public function calculate(float $julianDateTerrestrialTime): float
    {
        return ($julianDateTerrestrialTime - self::MARTIAN_EPOCH_START_JD_TT) / self::EARTH_DAYS_PER_SOL;
    }
}
