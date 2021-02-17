<?php

namespace Tobexkee\Reloadly\Api;

class Fxrate extends BaseApi
{
    protected const URI = 'operators/fx-rate';

    public function fetch($operatorId, $amount): mixed
    {
        return $this->post(
            self::URI,
            compact('operatorId', 'amount'),
            ['Accept' => 'application/com.reloadly.topups-v1+json']
        );
    }
}
