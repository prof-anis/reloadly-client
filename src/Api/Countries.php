<?php

namespace Tobexkee\Reloadly\Api;

class Countries extends BaseApi
{
    protected const URI = 'countries';

    public function fetch($iso = ''): mixed
    {
        return $iso == ''
            ? $this->get(self::URI)
            : $this->get(self::URI."/$iso");
    }
}
