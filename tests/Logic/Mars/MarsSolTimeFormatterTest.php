<?php

namespace App\Tests\Logic\Mars;

use App\Logic\Mars\MarsSolTimeFormatter;
use PHPUnit\Framework\TestCase;

class MarsSolTimeFormatterTest extends TestCase
{

    public function testFormat()
    {
        $fomatter = new MarsSolTimeFormatter();

        $result = $fomatter->format(0.47121392974);

        $this->assertSame('11:18:32.883', $result);
    }
}
