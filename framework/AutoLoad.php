<?php
namespace App\Framework;

class AutoLoad
{
    public function __invoke($namespacePath)
    {
        $filePath = $this->getFilePath($namespacePath);

        if (is_readable($filePath)) {
            include_once $filePath;
        } else {
            die("$filePath does not exist.");
        }
    }

    private function getFilePath($namespacePath)
    {
        $pathParts = explode('\\', $namespacePath);

        list($path, $className) = $this->parsePathParts($pathParts);

        return dirname(__FILE__, 2) . $path . $className;
    }

    private function parsePathParts($pathParts)
    {
        $path = DIRECTORY_SEPARATOR;
        $className = '';

        foreach ($pathParts as $key => $pathPart) {
            $isEndOfArray = ( $key + 1 === count($pathParts) );

            if ($isEndOfArray) {
                $className = $pathPart . '.php';
            } elseif ($key === 0) {
                $path .= strtolower($pathPart) . DIRECTORY_SEPARATOR;
            } else {
                $path .= $pathPart . DIRECTORY_SEPARATOR;
            }
        }

        return [$path, $className];
    }
}

spl_autoload_register(new AutoLoad());