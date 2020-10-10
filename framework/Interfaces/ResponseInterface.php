<?php

namespace Framework\Interfaces;

interface ResponseInterface
{
    public function __construct($data);
    public function send();
}