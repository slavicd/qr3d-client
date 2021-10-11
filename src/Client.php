<?php

namespace Entropi\Qr3dClient;

use Psr\Http\Client\ClientInterface;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    private $url;
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->client = new GuzzleClient();
    }

    /**
     * @param string $url
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function make(string $url)
    {
        $resp = $this->client->get($this->url, ['query' => ['url' => $url]]);
        $json = json_decode($resp->getBody());
        return $json;
    }
}