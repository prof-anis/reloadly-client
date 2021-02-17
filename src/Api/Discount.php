<?php

namespace Tobexkee\Reloadly\Api;

class Discount extends BaseApi
{
    protected const URI = 'operators';

    public function fetch(array $parameters = []): mixed
    {
        return $this->get(self::URI.'/commissions', $parameters);
    }

    public function fetchById($id): mixed
    {
        return   $this->get(self::URI.'/operators/'.$id.'/commissions');
    }
}
