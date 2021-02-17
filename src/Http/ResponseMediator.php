<?php

namespace Tobexkee\Reloadly\Http;

use GuzzleHttp\Psr7\Response;
use Illuminate\Collection;

class ResponseMediator
{

    public static function getContent($response): mixed
    {
        $body = $response->getBody()->__toString();

        $content = json_decode($body, true);

        if (JSON_ERROR_NONE === json_last_error()) {
            return static::parseContent($content);
        }

        return $body;
    }

    protected static function parseContent($content): mixed
    {
        if (is_array($content) && isset($content['data'])) {
            $data = $content['data'];
            if (isset($data[0])) {
                return Collection::make($data);
            }

            return $data;
        }

        return $content;
    }

    public static function getHeader(Response $response, $name): string|null
    {
        $headers = $response->getHeader($name);

        return array_shift($headers);
    }

    public static function getHeaders(Response $response): array
    {
        return $response->getHeaders();
    }
}
