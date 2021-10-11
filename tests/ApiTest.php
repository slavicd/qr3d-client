<?php

namespace Entropi\Qr3dClient\Tests;

use Entropi\Qr3dClient\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class ApiTest extends TestCase
{
    const SERVICE_URL = 'http://qr3d.localhost/';

    /**
     *
     */
    public function testConstructor()
    {
        $c = new Client(self::SERVICE_URL);
        $this->assertIsObject($c);

        return $c;
    }

    /**
     * @depends testConstructor
     */
    public function testMake(Client $c)
    {
        $resp = $c->make('http://google.com?q=3d+printing');
        $this->assertInstanceOf(\stdClass::class, $resp);

    }
}