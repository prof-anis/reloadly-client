<?php

namespace Tobexkee\Reloadly\Test;

use Tobexkee\Reloadly\Client;

class ClientTest extends TestCase
{
    public function setUp(): void
    {
        $app = $this->createApplication();
        $this->client = $app->make(Client::class);
    }

    public function test_set_header()
    {
        $this->client->addHeader('HEADER_TYPE', 'HEADER_VALUE');
        $this->assertTrue(in_array('HEADER_VALUE', $this->client->getHeaders()));
        $this->assertArrayHasKey('HEADER_TYPE', $this->client->getHeaders());
    }

    public function test_valid_main_headers()
    {
        $this->client->withMainHeaders();
        $this->assertTrue(in_array('application/json', $this->client->getHeaders()));
        $this->assertArrayHasKey('Content-Type', $this->client->getHeaders());
    }

    public function will_throw_client_error_exception_on_client_error()
    {

    }
}
