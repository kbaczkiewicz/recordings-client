<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 10:03
 */

namespace KBatch\RecordingsRestClient\Response\Model;


class Recording
{
    private $file;

    /**
     * Recording constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }


}