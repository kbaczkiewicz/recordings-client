<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 09:04
 */

namespace KBatch\RecordingsRestClient\Client;

class Client
{
    private $client;
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }
}