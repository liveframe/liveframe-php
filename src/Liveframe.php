<?php

namespace Liveframe\Liveframe;

class Liveframe
{
    protected $account;
    protected $token;

    public function __construct(string $account = null, string $token = null)
    {
        if (! $account || ! $token) {
            return;
        }

        $this->account = $account;
        $this->token = $token;
    }
}