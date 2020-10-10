<?php

namespace Framework\Responses;

use Framework\Interfaces\ResponseInterface;

class JSONResponse implements ResponseInterface
{
    private $jsonData;

    public function __construct($data)
    {
        //todo: validate data is what is expected. otherwise throw.
        $this->jsonData = $data;
    }

    public function send()
    {
        //todo: need to test this
        header('Content-Type:application/json');
        echo json_encode($this->jsonData);
    }
}