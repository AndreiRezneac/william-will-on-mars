<?php

namespace App\Tests\Logic;

use App\Logic\Earth\EarthTimeCalculator;
use App\Logic\EarthMarsDateTimesCalculator;
use App\Logic\Mars\DateTimeFormatter;
use App\Logic\Mars\MarsTimeCalculator;
use \DateTime;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EarthMarsDateTimesCalculatorTest extends TestCase
{

    public function testImplementation(): void
    {
        $utc = new DateTime('2020-10-15 14:33:45.928');
        $terrestrialTimeCalculator = $this->getMock(EarthTimeCalculator::class, 'calculate', 1602772425928.0, 1.2);
        $marsCoordinatedTimeCalculator = $this->getMock(MarsTimeCalculator::class, 'calculate', 1.2, 1.3);
        $marsSolTimeCalculator = $this->getMock(MarsTimeCalculator::class, 'calculate', 1.3, 1.4);
        $marsSolTimeFormatter = $this->getMock(DateTimeFormatter::class, 'format', 1.4, 'ok');

        $calculator = new EarthMarsDateTimesCalculator(
            $terrestrialTimeCalculator,
            $marsCoordinatedTimeCalculator,
            $marsSolTimeCalculator,
            $marsSolTimeFormatter
        );

        $expectedOutput = '{"UTC":"2020-10-15T14:33:45.928+00:00","MTC":"1.3","MSD":"ok"}';

        $this->assertSame($expectedOutput, (string)$calculator->calculate($utc));
    }

    private function getMock(string $className, string $method, $input, $output): MockObject {

        $mock = $this->createMock($className);
        $mock->expects($this->any())
            ->method($method)
            ->with($input)
            ->will($this->returnValue($output));

        return $mock;
    }
}
