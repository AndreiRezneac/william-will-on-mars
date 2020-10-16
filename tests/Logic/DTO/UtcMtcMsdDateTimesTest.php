<?php

namespace App\Tests\Logic\DTO;

use App\Logic\DTO\UtcMtcMsdDateTimes;
use PHPUnit\Framework\TestCase;

class UtcMtcMsdDateTimesTest extends TestCase
{

    public function test__toString()
    {
        $dateTime = new UtcMtcMsdDateTimes('utc date time', 'mtc date time', 'msd time');

        $this->assertSame(
            '{"UTC":"utc date time","MTC":"mtc date time","MSD":"msd time"}',
            (string)$dateTime
        );
    }
}
