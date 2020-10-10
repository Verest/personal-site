<?php 

require(dirname(__FILE__, 2) . "/framework/Includes/helpers.php");

require(getBasePath("framework/Includes/AutoLoad.php"));
require(getBasePath("framework/PhpSimpleFramework.php"));

Framework\PHPSimpleFramework::initialize();
Framework\PHPSimpleFramework::handleRequest();