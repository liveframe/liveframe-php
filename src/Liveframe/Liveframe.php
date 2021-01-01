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

    public function __construct(array $args = [])
    {
        if (! $args['account'] || ! $args['token']) {
            throw new Exception('Account ID and Token are required');
        }

        $this->account = $args['account'];
        $this->token = $args['token'];

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
        return new Assessments(['account' => $this->account, 'token' => $this->token]);
    }

    public function sessions() {
        return new Sessions(['account' => $this->account, 'token' => $this->token]);
    }
}