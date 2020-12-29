<?php

namespace Liveframe;

use Exception;
use Liveframe\Liveframe;

class Assessments extends Liveframe
{
    public function list()
    {
        $response = $this->client->post('assessment/list');
        return $response->getBody()->getContents();
    }

    public function get($id)
    {
        if (! $id) {
            throw new Exception('Assessment ID required');
        }

        $response = $this->client->post('assessment/get', [
            'json' => ['assessment_id' => $id]
        ]);
        return $response->getBody()->getContents();
    }

    public function create($name, $options = [], $active = 1)
    {
        if (! $name) {
            throw new Exception('Assessment ID required');
        }

        $response = $this->client->post('assessment/create', [
            'json' => [
                'name' => $name,
                'options' => $options,
                'active' => $active
            ]
        ]);
        return $response->getBody()->getContents();
    }

    public function update($id, $args)
    {
        if (! $id) {
            throw new Exception('Assessment ID required');
        }

        if (! $args || ! array_key_exists('options', $args)) {
            throw new Exception('Updated options are required');
        }

        $options = [
            'assessment_id' => (string) $id,
            'options' => $args['options']
        ];

        if (array_key_exists('name', $args)) {
            $options['name'] = (string) $args['name'];
        }

        if (array_key_exists('active', $args)) {
            $options['active'] = (bool) $args['active'];
        }

        $response = $this->client->post('assessment/update', [
            'json' => $options
        ]);
        return $response->getBody()->getContents();
    }

    public function delete($id)
    {
        if (! $id) {
            throw new Exception('Assessment ID required');
        }

        $response = $this->client->post('assessment/delete', [
            'json' => ['assessment_id' => $id]
        ]);
        return $response->getBody()->getContents();
    }
}