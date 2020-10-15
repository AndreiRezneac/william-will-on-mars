<?php

namespace App\Tests\Logic\Earth;

use App\Logic\Earth\FixedTaiUtcAdjustmentProvider;
use PHPUnit\Framework\TestCase;

class FixedTaiUtcAdjustmentProviderTest extends TestCase
{
    public function testGet()
    {
        $provider = new FixedTaiUtcAdjustmentProvider();

        $this->assertSame(69.134, $provider->get(rand()));
    }
}
