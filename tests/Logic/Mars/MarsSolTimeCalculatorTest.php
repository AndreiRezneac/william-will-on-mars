<?php

namespace App\Tests\Logic\Mars;

use App\Logic\Mars\MarsSolTimeCalculator;
use PHPUnit\Framework\TestCase;

class MarsSolTimeCalculatorTest extends TestCase
{

    public function testCalculate()
    {
        $calculator = new MarsSolTimeCalculator();

        $result = $calculator->calculate(52150.47121392974);

        $this->assertSame(0.47121392974, $result);
    }
}
