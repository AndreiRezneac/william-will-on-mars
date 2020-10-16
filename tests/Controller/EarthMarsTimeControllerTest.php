<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EarthMarsTimeControllerTest extends WebTestCase
{
    public function test_earthMarsTimesAction_with_VALID_data(): void {
        $client = static::createClient();
        $utcDateTime = htmlentities('13 September 2020 15:43:13.908');
        $client->request('GET', '/v1/earth-mars-times/' . $utcDateTime);
        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());

        $expectedContent = '{"UTC":"2020-09-13T15:43:13.908+00:00","MTC":"52150.47121393","MSD":"11:18:32.883"}';
        $this->assertSame($expectedContent, $response->getContent());
    }

    public function test_earthMarsTimesAction_with_INVALID_data(): void
    {
        $client = static::createClient();
        $utcDateTime = htmlentities('foo bar');
        $client->request('GET', '/v1/earth-mars-times/' . $utcDateTime);
        $response = $client->getResponse();

        $this->assertSame(400, $response->getStatusCode());
    }
}
