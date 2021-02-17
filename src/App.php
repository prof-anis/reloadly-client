<?php

namespace Tobexkee\Reloadly;

use Tobexkee\Reloadly\Config as ReloadlyConfig;
use Tobexkee\Reloadly\Contract\ApplicationInterface;
use Tobexkee\Reloadly\Contract\Config;
use Tobexkee\Reloadly\Exceptions\BadMethodCallException;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;

class App extends Container implements ApplicationInterface
{

    protected string $apiBindPath = __DIR__.'/config/bindings.php';

    protected array $apiBindings;

    public string $client_key;

    public string $secret_key;

    public string $env;

    public function __construct(string $client_key = '', string $secret_key = '', string $env = 'sandbox')
    {
        $this->client_key = $client_key;
        $this->secret_key = $secret_key;
        $this->env = $env;
        $this
            ->vendorBindings()
            ->loadApi()
            ->bindApi();
    }

    protected function loadApi(): App
    {
        $this->apiBindings = require($this->apiBindPath);

        return $this;
    }

    protected function bindApi(): void
    {
        foreach ($this->apiBindings as $reference => $implementation) {
            $this->bind($reference, function ($app) use ($implementation) {
                return new $implementation($this);
            });
        }
    }

    protected function vendorBindings(): App
    {
        $config = new ReloadlyConfig($this->client_key, $this->secret_key, $this->env);
        $this->instance(Config::class, $config);

        $this->bind(Client::class, function ($app) {
            return new Client($app);
        });

        return $this;
    }

    public function makeApi(string $api): mixed
    {
        try {
            return	$this->make($api);
        } catch (BindingResolutionException $e) {
            throw new BadMethodCallException("the {$api} api does not exist");
        }
    }
}
