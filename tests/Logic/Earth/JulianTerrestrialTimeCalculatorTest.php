<?php

namespace App\Tests\Logic\Earth;

use App\Logic\Earth\FixedTaiUtcAdjustmentProvider;
use App\Logic\Earth\JulianTerrestrialTimeCalculator;
use PHPUnit\Framework\TestCase;

class JulianTerrestrialTimeCalculatorTest extends TestCase
{

    public function testCalculate()
    {
        $adjustmentProvider = new FixedTaiUtcAdjustmentProvider();
        $calculator = new JulianTerrestrialTimeCalculator($adjustmentProvider);

        $result = $calculator->calculate(2459106.1550220833);

        $this->assertSame(2459106.1558222454, $result);
    }
}
