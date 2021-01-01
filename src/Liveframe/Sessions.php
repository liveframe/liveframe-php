<?php

namespace Liveframe;

use Exception;
use Liveframe\Liveframe;

class Sessions extends Liveframe
{
    public function list(array $args = [])
    {
        $response = $this->client->post('session/list', [
            'json' => ['assessment_id' => (string) $args['assessment_id']]
        ]);
        return $response->getBody()->getContents();
    }

    public function get(array $args = [])
    {
        if (! $args['username']) {
            throw new Exception('User name is required');
        }

        $options = ['username' => (string) $args['username']];
        if ($args['assessment_id']) {
            $options['assessment_id'] = (string) $args['assessment_id'];
        }
        if (array_key_exists('with_video', $args) && $args['with_video']) {
            $options['with_video'] = (bool) $args['with_video'];
        }

        $response = $this->client->post('session/get', [
            'json' => $options
        ]);
        return $response->getBody()->getContents();
    }

    public function create(array $args = [])
    {
        if (! $args['username'] || ! $args['assessment_id']) {
            throw new Exception('Assessment ID and user name required');
        }

        $response = $this->client->post('session/create', [
            'json' => [
                'username' => (string) $args['username'],
                'assessment_id' => (string) $args['assessment_id']
            ]
        ]);
        return $response->getBody()->getContents();
    }

    public function delete(array $args = [])
    {
        if (! $args['username'] || ! $args['assessment_id']) {
            throw new Exception('Assessment ID and user name required');
        }

        $response = $this->client->post('session/delete', [
            'json' => [
                'username' => (string) $args['username'],
                'assessment_id' => (string) $args['assessment_id']
            ]
        ]);
        return $response->getBody()->getContents();
    }
}