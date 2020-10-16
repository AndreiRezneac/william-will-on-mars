<?php

namespace App\Tests\Logic;

use App\Logic\EarthMarsDateTime;
use PHPUnit\Framework\TestCase;

class EarthMarsDateTimeTest extends TestCase
{

    public function test__toString()
    {
        $dateTime = new EarthMarsDateTime('utc date time', 'mtc date time', 'msd time');

        $this->assertSame(
            '{"UTC":"utc date time","MTC":"mtc date time","MSD":"msd time"}',
            (string)$dateTime
        );
    }
}
