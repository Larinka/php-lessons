<?php
function newAutoload($className)
{
    $pathToFile = __DIR__ . '/classes/' . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    include "$pathToFile";
}
function newIAutoload($interfaceName)
{
    $interfacePath = './interfaces/' . $interfaceName . '.php';
    if (file_exists($interfacePath))
    {
        include "$interfacePath";
    }
}
spl_autoload_register('newAutoload');
spl_autoload_register('newIAutoload');
