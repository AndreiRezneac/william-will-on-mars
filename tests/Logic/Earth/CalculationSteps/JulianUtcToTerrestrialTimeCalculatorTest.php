<?php

namespace App\Tests\Logic\Earth\CalculationSteps;

use App\Logic\Earth\CalculationSteps\FixedTaiUtcAdjustmentProvider;
use App\Logic\Earth\CalculationSteps\JulianUtcToTerrestrialTimeCalculator;
use PHPUnit\Framework\TestCase;

class JulianUtcToTerrestrialTimeCalculatorTest extends TestCase
{
    public function testCalculate()
    {
        $adjustmentProvider = new FixedTaiUtcAdjustmentProvider();
        $calculator = new JulianUtcToTerrestrialTimeCalculator($adjustmentProvider);

        $result = $calculator->calculate(2459106.1550220833);

        $this->assertSame(2459106.1558222454, $result);
    }
}
