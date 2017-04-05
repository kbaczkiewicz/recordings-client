<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 10:00
 */

namespace KBatch\RecordingsRestClient\Response;


class ResponseFactory
{
    /**
     * @param $requestType
     * @param $data
     * @return mixed
     * Creates response with type based on Response type
     */
    public static function createResponse($requestType, $data)
    {
        $respClass = str_replace('Request', 'Response', $requestType);
        return new $respClass($data);
    }
}