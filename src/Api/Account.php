<?php

namespace Tobexkee\Reloadly\Api;

use Tobexkee\Reloadly\Exceptions\ClientErrorException;

class Account extends BaseApi
{
    protected const URI = '/accounts';

    /**
     * @throws ClientErrorException
     */
    public function balance(): mixed
    {
        return $this->get(self::URI.'/balance');
    }
}
