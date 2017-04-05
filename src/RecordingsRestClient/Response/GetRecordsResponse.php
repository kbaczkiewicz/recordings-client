<?php
/**
 * Created by PhpStorm.
 * User: kbaczkiewicz
 * Date: 05.04.2017
 * Time: 10:02
 */

namespace KBatch\RecordingsRestClient\Response;


use KBatch\RecordingsRestClient\Response\Model\Recording;

class GetRecordsResponse implements ResponseInterface
{
    private $files;

    /**
     * GetRecordsResponse constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->files = [];
        foreach($data as $d) {
            $this->files[] = new Recording($d->file);
        }
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }


}