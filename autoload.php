<?php
function classLoader($className)
{
    $path = str_replace("App\\", "", $className);
    $path = str_replace("\\", "/", $path);
    require $path . '.php';
}

spl_autoload_register('classLoader');