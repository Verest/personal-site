<?php 

namespace Framework;

use Exception;
use Framework\Responses\JSONResponse;
use Framework\Responses\ViewResponse;

/**
 * Response object returned by controllers.
 */
class Response
{
    private $type;
    private $data;

    /**
     * Supported $type: "view", "json".
     * 
     * @param string $type
     * @param string|array $data
     * 
     * @throws Exception
     */
    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    public function get()
    {
        if ($this->type === 'view') {
            return new ViewResponse($this->data);
        } elseif ($this->type === 'json') {
            return new JSONResponse($this->data);
        } else {
            //todo: make custom exception
            throw new Exception("Invalid response type.");
        }
    }
}