<?php


namespace App\Logic\Earth;

// aka JD(tt)
class JulianTerrestrialTimeCalculator implements EarthTimeCalculator
{
    /**
     * @var TerrestrialTimeUtcAdjustmentProvider
     */
    private $adjustmentProvider;

    public function __construct(TerrestrialTimeUtcAdjustmentProvider $adjustmentProvider)
    {
        $this->adjustmentProvider = $adjustmentProvider;
    }

    public function calculate(float $julianUtcTime): float
    {
        return $julianUtcTime + $this->adjustmentProvider->get($julianUtcTime) / EarthTime::SECONDS_PER_DAY;
    }
}
