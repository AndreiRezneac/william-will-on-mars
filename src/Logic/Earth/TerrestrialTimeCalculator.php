<?php


namespace App\Logic\Earth;


class TerrestrialTimeCalculator implements EarthTimeCalculator
{
    /**
     * @var EarthTimeCalculator
     */
    private $gregorianUtcToJulianUtcTimeCalculator;

    /**
     * @var EarthTimeCalculator
     */
    private $julianUtcToTerrestrialTimeCalculator;

    public function __construct(
        EarthTimeCalculator $gregorianUtcToJulianUtcTimeCalculator,
        EarthTimeCalculator $julianUtcToTerrestrialTimeCalculator)
    {
        $this->gregorianUtcToJulianUtcTimeCalculator = $gregorianUtcToJulianUtcTimeCalculator;
        $this->julianUtcToTerrestrialTimeCalculator = $julianUtcToTerrestrialTimeCalculator;
    }


    public function calculate(float $gregorianUtcTimeWithMilliseconds): float
    {
        $julianUtcTime = $this->gregorianUtcToJulianUtcTimeCalculator->calculate($gregorianUtcTimeWithMilliseconds);

        return $this->julianUtcToTerrestrialTimeCalculator->calculate($julianUtcTime);
    }
}
