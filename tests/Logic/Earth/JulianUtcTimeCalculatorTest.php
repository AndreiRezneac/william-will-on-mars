<?php

namespace App\Tests\Logic\Earth;

use App\Logic\Earth\JulianUtcTimeCalculator;
use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class JulianUtcTimeCalculatorTest extends TestCase
{

    public function testCalculate(): void
    {
        $utcTimeZone = new DateTimeZone('UTC');
        $date = new DateTime('13 September 2020 15:43:13.908', $utcTimeZone);
        $millisecondsOnly = intval($date->format('v'));
        $dateInMilliseconds = $date->getTimestamp() * 1000 + $millisecondsOnly;

        $calculator = new JulianUtcTimeCalculator();
        $result = $calculator->calculate($dateInMilliseconds);

        $this->assertSame(2459106.1550220833, $result);
    }
}
