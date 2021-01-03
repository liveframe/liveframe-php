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

    public function get(array $args = [])
    {
        if (! $args['id']) {
            throw new Exception('Assessment ID required');
        }

        $response = $this->client->post('assessment/get', [
            'json' => ['assessment_id' => $args['id']]
        ]);
        return $response->getBody()->getContents();
    }

    public function create(array $args = [])
    {
        if (! array_key_exists('name', $args)) {
            throw new Exception('Assessment name required');
        }

        if (! array_key_exists('options', $args)) {
            throw new Exception('Assessment options required');
        }

        if (! array_key_exists('streams', $args['options'])) {
            throw new Exception('Assessment recorded streams required');
        }

        $active = array_key_exists('active', $args) ? $args['active'] : 1;

        $response = $this->client->post('assessment/create', [
            'json' => [
                'name' => (string) $args['name'],
                'options' => (array) $args['options'],
                'active' => $active
            ]
        ]);
        return $response->getBody()->getContents();
    }

    public function update(string $id, array $args = [])
    {
        if (! $id) {
            throw new Exception('Assessment ID required');
        }

        if (! $args || ! array_key_exists('options', $args)) {
            throw new Exception('Updated options are required');
        }

        $options = [
            'assessment_id' => $id,
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

    public function delete(array $args = [])
    {
        if (! $args['id']) {
            throw new Exception('Assessment ID required');
        }

        $response = $this->client->post('assessment/delete', [
            'json' => ['assessment_id' => $args['id']]
        ]);
        return $response->getBody()->getContents();
    }
}