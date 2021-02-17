<?php

namespace Tobexkee\Reloadly\Api;

class Promotions extends BaseApi
{
    protected const URI = 'promotions';

    public function fetch(array $data = []): mixed
    {
        return $this->get(self::URI, $data);
    }

    public function fetchById(string $id): mixed
    {
        return $this->get(self::URI.'/'.$id);
    }

    public function fetchByCountry(string $country_code): mixed
    {
        return $this->get(self::URI.'/country-codes/'.$country_code);
    }

    public function fetchByOperator(string $operator): mixed
    {
        return $this->get(self::URI.'/operators/'.$operator);
    }
}
