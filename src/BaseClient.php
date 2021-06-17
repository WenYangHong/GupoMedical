<?php


namespace GupoMedical;


use GuzzleHttp\Client;

class BaseClient
{
    protected $client;
    protected $base_url;

    public function __construct($app)
    {
        $this->app = $app;
        if (!$this->app['config']->get('hid') || !$this->app['config']->get('base_url')) {
            return ['code' => 404, 'errMsg' => '缺少hid或base_url'];
        }
        $this->base_url = $this->app['config']->get('base_url');
        $this->client = new Client(['base_uri' => $this->base_url]);
    }


    protected function get($uri, $params)
    {
        $hid = $this->app['config']->get('hid');
        $params = compact('hid') + $params;
        try {
            $response = $this->client->get($uri, [
                'query' => $params,
                'header' => $this->app['config']->get('header')
            ]);
            $response = $response->getBody()->getContents();
            return json_decode($response, true);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}