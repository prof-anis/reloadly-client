<?php

namespace Tobexkee\Reloadly\Test;

use Tobexkee\Reloadly\Reloadly;
use PHPUnit\Framework\TestCase;

class ReloadlyTest extends TestCase
{
    public function setUp(): void
    {
        $this->reloadly = new Reloadly();
    }

    public function test_will_throw_exception_when_invalid_api_is_called()
    {
        $this->expectException(\Tobexkee\Reloadly\Exceptions\BadMethodCallException::class);
        $this->reloadly->thisApiDoesNotExist();
    }

    /**
     * @dataProvider provideApi
     */
    public function test_api_returns_appropriate_object($api, $object)
    {
        $this->assertInstanceOf($object, (new Reloadly())->{$api}());
    }

    public function provideApi()
    {
        return [
            [
                'countries',
                \Tobexkee\Reloadly\Api\Countries::class,
            ],
            [
                'account',
                \Tobexkee\Reloadly\Api\Account::class,
            ],
            [
                'discount',
                \Tobexkee\Reloadly\Api\Discount::class,
            ],
            [
                'fxrate',
                \Tobexkee\Reloadly\Api\Fxrate::class,
            ],
            [
                'operators',
                \Tobexkee\Reloadly\Api\Operators::class,
            ],
            [
                'topup',
                \Tobexkee\Reloadly\Api\Topup::class,
            ],
            [
                'transactions',
                \Tobexkee\Reloadly\Api\Transactions::class,
            ],
            [
                'promotions',
                \Tobexkee\Reloadly\Api\Promotions::class,
            ],
        ];
    }
}
