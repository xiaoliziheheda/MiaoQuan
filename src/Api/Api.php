<?php


namespace Miao\Api;


use GuzzleHttp\Client;
use Miao\Factory;

class Api
{
    protected $config = [];
    protected $url = 'http://api.web.21ds.cn/taoke/';

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function convert(array $field = [])
    {
        $this->mergeParams($field);
        return $this->sendRequest('doItemHighCommissionPromotionLinkByAll');
    }

    public function mergeParams(array $field = [])
    {
        $this->config = array_merge($this->config, $field);
    }

    private function sendRequest($action = '', $method = 'get')
    {
        try {
            $client = new Client();
            if ($method == 'get') {
                $options = ['query' => $this->config];
            } else {
                $options = ['form_params' => $this->config];
            }
            $res = $client->request($method, $this->url.$action, $options);
            if ($res->getStatusCode() == 200) {
                $content = $res->getBody()->getContents();
                $content = json_decode($content, true);
                if (isset($content['data'])) {
                    return $content['data'];
                }
            }
            return [];
        }catch (\Exception $exception) {
            return [];
        }
    }
}