<?php

namespace Tobexkee\Reloadly\Api;

class Topup extends BaseApi
{
    protected const URI = 'topups';

    public function send(array $data): mixed
    {
        return $this->post(self::URI, $data);
    }
}
