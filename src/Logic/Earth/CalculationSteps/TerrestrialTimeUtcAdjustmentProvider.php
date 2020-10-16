<?php


namespace App\Logic\Earth\CalculationSteps;

// https://en.wikipedia.org/wiki/Terrestrial_Time
interface TerrestrialTimeUtcAdjustmentProvider
{
    // UTC is based on International Atomic Time (TAI)
    const TT_TAI_DIFF_WHEN_FIRST_ESTABLISHED = 32.134;

    public function get(float $utcTime): float;
}
