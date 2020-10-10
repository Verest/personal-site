<?php

namespace Framework\Responses;

use Framework\Interfaces\ResponseInterface;

class ViewResponse implements ResponseInterface
{
    private $viewPath;
    private $viewArgs;

    public function __construct($data)
    {
        if (is_string($data)) {
            $this->viewPath = $data;
            $this->viewArgs = [];
        } else {
            //todo: validate data is what is expected. otherwise throw.
            $this->viewPath = $data['view'];
            $this->viewArgs = $data['args'] ?? [];
        }
    }

    public function send()
    {
        foreach ($this->viewArgs as $name => $value) {
            $$name = $value;
        }

        header('Content-Type: text/html');
        include(getViewPath($this->viewPath));
    }
}