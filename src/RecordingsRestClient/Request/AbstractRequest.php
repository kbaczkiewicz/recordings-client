<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 09:34
 */

namespace KBatch\RecordingsRestClient\Request;


abstract class AbstractRequest implements RequestInterface
{
    protected $headers = [];
    protected $getData = [];
    protected $postData = [];
    protected $route;
    protected $method;

    /**
     * @param string $auth
     * Sets authentication header for API
     */
    public function setAuthenticationHeader($auth)
    {
        $this->headers['Authorization'] = $auth;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getGetData()
    {
        return $this->getData;
    }

    /**
     * @return array
     */
    public function getPostData()
    {
        return $this->postData;
    }


}