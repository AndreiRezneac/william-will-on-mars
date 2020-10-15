<?php

namespace App\Tests\Logic\Mars;

use App\Logic\Mars\MarsCoordinatedTimeCalculator;
use PHPUnit\Framework\TestCase;

class MarsCoordinatedTimeCalculatorTest extends TestCase
{

    public function testCalculate()
    {
        $calculator = new MarsCoordinatedTimeCalculator();

        $result = $calculator->calculate(2459106.1558222454);

        $this->assertSame(52150.47121392974, $result);
    }
}
