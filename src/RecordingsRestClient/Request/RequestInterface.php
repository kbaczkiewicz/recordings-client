<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 09:32
 */

namespace KBatch\RecordingsRestClient\Request;


interface RequestInterface
{
    public function setAuthenticationHeader($auth);
    public function setCredentials($username, $password, $server);

}