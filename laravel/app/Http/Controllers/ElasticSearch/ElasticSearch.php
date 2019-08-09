<?php

namespace App\Http\Controllers\ElasticSearch;

use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

class ElasticSearch extends Controller
{
    public $client = null;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->client = ClientBuilder::create()->build();
    }


    public function getClient()
    {
        if (!$this->client) {
            $this->client = ClientBuilder::create()->build();
        }
        return $this->client;
    }

    public function indexDocument()
    {
        $param = [
            'index' => 'my_index',
            'id'    => 'my_id',
            'body'  => [
                'testField' => 'abc'
            ]
        ];

        $response = $this->getClient()->index($param);
        return $response;
    }

    public function getDocument()
    {
        $param = [
            'index' => 'my_index',
            'id'    => 'my_id'
        ];

        $response  = $this->getClient()->get($param);
        return $response;
    }

    public function searchDocument()
    {
        $param = [
            'index' => 'my_index',
            'body'  => [
                'query' => [
                    'match' => [
                        'testField' => 'abc'
                    ]
                ]
            ]
        ];

        $response = $this->getClient()->search($param);
        return $response;
    }

    public function deleteDocument()
    {
        $param = [
            'index' => 'my_index',
            'id'    => 'my_id'
        ];

        $response = $this->getClient()->delete($param);
        return $response;
    }

    public function deleteIndex()
    {
        $param = [
            'index' => 'my_index'
        ];

        $response = $this->getClient()->indices()->delete($param);
        return $response;
    }

    public function createIndex()
    {
        $param = [
            'index' => 'my_index',
            'body'  => [
                'settings' => [
                    'number_of_shards'   => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];

        $response = $this->getClient()->indices()->create($param);
        return $response;
    }
}