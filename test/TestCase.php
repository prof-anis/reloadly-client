<?php

namespace Tobexkee\Reloadly\Test;

use Tobexkee\Reloadly\App as ReloadlyApplication;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    public function createApplication(): ReloadlyApplication
    {
        return new ReloadlyApplication();
    }
}
