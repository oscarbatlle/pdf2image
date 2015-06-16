<?php
/**
 * @author Oscar Batlle <oscarbatlle@gmail.com>
 */
spl_autoload_register(function ($class)
{
    if (!@include_once "class/{$class}.php")
    {
        if (!@include_once "classes/{$class}.php")
        {
            Throw new Exception("Couldn't find the class \"{$class}\"");
        }
    }
});