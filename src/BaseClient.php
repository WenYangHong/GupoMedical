<?php


namespace GupoMedical;


use GuzzleHttp\Client;
use function Couchbase\defaultDecoder;

class BaseClient
{
    protected $client;
    protected $base_url = 'https://h-api-hid.group-ds.com:32731';

    public function __construct($app)
    {
        $this->app = $app;
        if (!$this->app['config']->get('hid') && !$this->app['config']->get('base_url')) {
            throw new \Exception('缺少hid或base_url');
        }
        if ($this->app['config']->get('base_url')) {
            $this->base_url = $this->app['config']->get('base_url');
        } else {
            $this->base_url = str_replace('hid', $this->app['config']->get('hid'), $this->base_url);
        }
        $this->client = new Client(['base_uri' => $this->base_url]);
    }


    protected function get($uri, $params)
    {
        $hid = $this->app['config']->get('hid');
        $params = compact('hid')+ $params ;
        $response = $this->client->get($uri, [
            'query' => $params,
            'header'=> $this->app['config']->get('header')
        ]);
        $response = $response->getBody()->getContents();
        return json_decode($response);
    }
}