<?php

namespace Liveframe;

use Exception;
use Liveframe\Liveframe;

class Sessions extends Liveframe
{
    public function list($assessmentId)
    {
        $response = $this->client->post('session/list', [
            'json' => ['assessment_id' => (string) $assessmentId]
        ]);
        return $response->getBody()->getContents();
    }

    public function get($userName, $assessmentId = '')
    {
        if (! $userName) {
            throw new Exception('User name is required');
        }

        $options = ['username' => (string) $userName];
        if ($assessmentId) {
            $options['assessment_id'] = (string) $assessmentId;
        }

        $response = $this->client->post('session/get', [
            'json' => $options
        ]);
        return $response->getBody()->getContents();
    }

    public function create($userName, $assessmentId)
    {
        if (! $userName || ! $assessmentId) {
            throw new Exception('Assessment ID and user name required');
        }

        $response = $this->client->post('session/create', [
            'json' => [
                'username' => (string) $userName,
                'assessment_id' => (string) $assessmentId
            ]
        ]);
        return $response->getBody()->getContents();
    }

    public function delete($userName, $assessmentId)
    {
        if (! $userName || ! $assessmentId) {
            throw new Exception('Assessment ID and user name required');
        }

        $response = $this->client->post('session/delete', [
            'json' => [
                'username' => (string) $userName,
                'assessment_id' => (string) $assessmentId
            ]
        ]);
        return $response->getBody()->getContents();
    }
}