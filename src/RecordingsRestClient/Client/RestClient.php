<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 09:04
 */

namespace KBatch\RecordingsRestClient\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use KBatch\RecordingsRestClient\Request\RequestInterface;
use KBatch\RecordingsRestClient\Response\ResponseFactory;

class RestClient
{
    const HTTP_ERROR = 500;
    const ALLOWED_CODES = array(200, 201, 202);

    /** @var \GuzzleHttp\Client */
    private $client;
    private $server;
    private $username;
    private $password;
    private $auth;

    /**
     * RestClient constructor.
     * @param $auth
     * @param $url
     */
    public function __construct($auth, $url)
    {
        $this->client = new Client(['base_uri' => $url]);
        $this->auth = $auth;
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     * @throws \Exception
     * Sends request of given type and returns response based on request type
     */
    public function sendRequest(RequestInterface $request)
    {
        try {
            $request->setAuthenticationHeader($this->auth);
            $res = $this->client->request($request->getMethod(), $request->getRoute(), [
                'query' => $request->getGetData(),
                'form_params' => $request->getPostData(),
                'headers' => $request->getHeaders(),
                'http_errors' => false
            ]);

            if (!in_array($res->getStatusCode(), self::ALLOWED_CODES)) {
                if ($res->getStatusCode() == self::HTTP_ERROR)
                    throw new \Exception('Internal Server Error. Route: ' . $request->getRoute());
                else {
                    throw new \Exception($res->getBody()->getContents());
                }
            }
            $respContent = \GuzzleHttp\json_decode($res->getBody()->getContents());
            $resp = ResponseFactory::createResponse(get_class($request), $respContent);
            return $resp;
        } catch (RequestException $ex) {
            throw new \Exception('There was a problem while processing request. Route: ' . $request->getRoute());
        }
    }
}
