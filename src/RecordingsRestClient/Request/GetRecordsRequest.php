<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 09:41
 */

namespace KBatch\RecordingsRestClient\Request;


class GetRecordsRequest extends AbstractRequest
{

    /**
     * GetRecordsRequest constructor.
     */
    public function __construct($method = 'GET')
    {
        $this->route = 'get/recordings';
        $this->method = $method;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->getData['phone'] = $phone;
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->getData['order'] = $order;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $server
     */
    public function setCredentials($username, $password, $server = 'imap.gmail.com')
    {
        $this->getData['username'] = $username;
        $this->getData['password'] = $password;
        $this->getData['server'] = $server;
    }
}