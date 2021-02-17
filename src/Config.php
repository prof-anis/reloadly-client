<?php

namespace Tobexkee\Reloadly;

use Tobexkee\Reloadly\Exceptions\RuntimeException;
use Tobexkee\Reloadly\Contract\Config as ConfigInterface;

class Config implements ConfigInterface
{
    protected string $client_key;

    protected string $secret_key;

    protected string $env;

    protected const AUTH_URI = 'https://auth.reloadly.com/oauth/token';

    public function __construct(string $client_key = '', string $secret_key = '', string $env = 'sandbox')
    {
        $this->client_key = $client_key ?: getenv('RELOADLY_CLIENT_KEY');
        $this->secret_key = $secret_key ?: getenv('RELOADLY_SECRET_KEY');
        $this->env = $env;

        if (!$this->client_key || !$this->secret_key) {
            throw new RuntimeException('Secret key and/or public key not set');
        }
    }

    public function getClientKey(): string
    {
        return $this->client_key;
    }

    public function getSecretKey(): string
    {
        return $this->secret_key;
    }

    public function getAuthUri(): string
    {
        return self::AUTH_URI;
    }

    public function getAudience(): string
    {
        return $this->env == 'sandbox'
            ? 'https://topups-sandbox.reloadly.com/'
            : 'https://topups.reloadly.com/';
    }
}
