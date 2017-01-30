<?php

class YandexGeo
{
    protected $selector;

    public function searchLocation($address)
    {
        $api = new \Yandex\Geo\Api();
        $address = htmlspecialchars($address);
        $api->setQuery($address);
        $api->setLimit(15)
            ->load();
        $response = $api->getResponse();
        $collection = $response->getList();
        return $collection;
    }

    public function userSelection()
    {
        if(isset($_GET['result'])) {
            $this->selector = htmlspecialchars($_GET['result']);
        } else {
            $this->selector = 0;
        }
    }

    public function getSelector()
    {
        return $this->selector;
    }
}
