<?php

namespace Liveframe;

use Exception;
use Liveframe\Sessions;
use Liveframe\Assessments;

class Liveframe
{
    protected $account;
    protected $token;
    protected $client;

    public function __construct(string $account = null, string $token = null)
    {
        if (! $account || ! $token) {
            throw new Exception('Account ID and Token are required');
        }

        $this->account = $account;
        $this->token = $token;

        $this->client = new \GuzzleHttp\Client([
            'verify' => false,
            'base_uri' => 'https://liveframe.io.test/api/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ]
        ]);
    }

    public function __get($name)
    {
        if (method_exists($this, $name)) {
            $method = $name;
            return $this->$method();
        }

        throw new Exception('Unknown resource ' . $name);
    }

    public function assessments() {
        return new Assessments($this->account, $this->token);
    }

    public function sessions() {
        return new Sessions($this->account, $this->token);
    }
}