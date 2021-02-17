<?php

namespace Tobexkee\Reloadly;

use Tobexkee\Reloadly\Exceptions\BadMethodCallException;

class Reloadly
{
    protected App $app;

    public function __construct(string $client_id = '', string $client_secret = '', string $env = 'sandbox')
    {
        $this->app = new App($client_id, $client_secret, $env);
    }

    /**
     * @throws BadMethodCallException
     */
    public function __call(string $method, array $args): mixed
    {
        return $this->app->makeApi($method);
    }
}
