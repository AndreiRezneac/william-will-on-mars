<?php


namespace App\Logic\Earth\CalculationSteps;

class FixedTaiUtcAdjustmentProvider implements TerrestrialTimeUtcAdjustmentProvider
{
    private const LEAP_SECONDS_IN_2020 = 37;

    public function get(float $utcTime): float
    {
        return self::TT_TAI_DIFF_WHEN_FIRST_ESTABLISHED + self::LEAP_SECONDS_IN_2020;
    }
}
