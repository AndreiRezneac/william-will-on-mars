<?php

namespace App\Tests\Logic\Earth;

use App\Logic\Earth\CalculationSteps\GregorianUtcToJulianUtcTimeCalculator;
use App\Logic\Earth\EarthTimeCalculator;
use App\Logic\Earth\TerrestrialTimeCalculator;
use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class TerrestrialTimeCalculatorTest extends TestCase
{

    public function testCalculate()
    {
        $gregorianUtcToJulianUtcTimeCalculator = $this->createMock(EarthTimeCalculator::class);
        $gregorianUtcToJulianUtcTimeCalculator
            ->expects($this->once())
            ->method('calculate')
            ->with($this->equalTo(42.42))
            ->will($this->returnValue(44.44));

        $julianUtcToTerrestrialTimeCalculator = $this->createMock(EarthTimeCalculator::class);
        $julianUtcToTerrestrialTimeCalculator
            ->expects($this->once())
            ->method('calculate')
            ->with($this->equalTo(44.44))
            ->will($this->returnValue(50.50));

        $calculator = new TerrestrialTimeCalculator(
            $gregorianUtcToJulianUtcTimeCalculator,
            $julianUtcToTerrestrialTimeCalculator
        );

        $result = $calculator->calculate(42.42);
        $this->assertSame(50.50, $result);
    }
}
