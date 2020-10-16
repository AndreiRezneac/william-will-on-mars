<?php

namespace App\Tests\Logic\Earth\CalculationSteps;

use App\Logic\Earth\CalculationSteps\GregorianUtcToJulianUtcTimeCalculator;
use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class GregorianUtcToJulianUtcTimeCalculatorTest extends TestCase
{

    public function testCalculate(): void
    {
        $dateInMilliseconds = $this->getGregorianUtcTimeInMilliseconds();

        $calculator = new GregorianUtcToJulianUtcTimeCalculator();
        $result = $calculator->calculate($dateInMilliseconds);

        $this->assertSame(2459106.1550220833, $result);
    }

    private function getGregorianUtcTimeInMilliseconds(): float
    {
        $utcTimeZone = new DateTimeZone('UTC');
        $date = new DateTime('13 September 2020 15:43:13.908', $utcTimeZone);
        $millisecondsOnly = intval($date->format('v'));

        return $date->getTimestamp() * 1000 + $millisecondsOnly;
    }
}
