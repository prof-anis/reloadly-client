<?php

namespace Tobexkee\Reloadly\Test;

use Tobexkee\Reloadly\Config;

class ConfigTest extends TestCase
{
    public function setUp(): void
    {
        $this->config = new Config();
    }

    public function test_get_secret_key()
    {
        $this->assertTrue($this->config->getSecretKey() === getenv('RELOADLY_SECRET_KEY'));
    }

    public function test_get_client_key()
    {
        $this->assertTrue($this->config->getClientKey() === getenv('RELOADLY_CLIENT_KEY'));
    }

    public function test_get_env()
    {;
        $this->assertTrue($this->config->getAudience() === 'https://topups-sandbox.reloadly.com/');
    }
}
