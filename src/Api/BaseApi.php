<?php

namespace Tobexkee\Reloadly\Api;

use Tobexkee\Reloadly\Client;
use Tobexkee\Reloadly\Contract\ApplicationInterface;
use Tobexkee\Reloadly\Contract\Config;
use Tobexkee\Reloadly\Exceptions\ClientErrorException;
use Tobexkee\Reloadly\Http\ResponseMediator;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

abstract class BaseApi
{
    protected string $base_url;

    private Client $client;

    public function __construct(ApplicationInterface $app)
    {
        $this->client = $app->make(Client::class);
        $this->base_url = ($app->make(Config::class))->getAudience();
    }


    public function get(string $uri, array $parameters = [], array $headers = []): mixed
    {
        $uri = count($parameters) > 0
            ? $this->base_url.$uri.'?'.http_build_query($parameters)
            : $this->base_url.$uri;

        try {
            $response = $this->client->withToken()->get($uri, ['headers'=>$headers]);

            return ResponseMediator::getContent($response);
        } catch (ClientException $e) {
            throw new ClientErrorException($e->getMessage());
        }
    }

    /**
     * @throws ClientErrorException
     * @throws GuzzleException
     */
    public function post(string $uri, array $parameters = [], array $headers = []): mixed
    {
        $uri = $this->base_url.$uri;

        try {
            $response = $this->client->withToken()->post($uri, ['json'=>$parameters, 'headers'=>$headers]);

            return ResponseMediator::getContent($response);
        } catch (ClientException $e) {
            throw new ClientErrorException($e->getMessage());
        }
    }
}
