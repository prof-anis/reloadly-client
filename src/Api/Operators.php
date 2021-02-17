<?php

namespace Tobexkee\Reloadly\Api;

class Operators extends BaseApi
{
    protected const URI = 'operators';

    public function fetch($options = []): mixed
    {
        return $this->get(self::URI, $options);
    }

    public function fetchById($id, $options = []): mixed
    {
        return $this->get(self::URI."/$id", $options);
    }

    public function fetchByIso($iso, $options = []): mixed
    {
        return $this->get(self::URI.'/countries/'.$iso, $options);
    }

    public function fetchByPhone($phone, $country_iso): mixed
    {
        return $this->get(self::URI.'/auto-detect/phone/'.$phone.'/countries/'.$country_iso);
    }
}
