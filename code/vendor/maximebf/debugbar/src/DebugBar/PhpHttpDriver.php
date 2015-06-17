<?php
/*
 * This file is part of the DebugBar package.
 *
 * (c) 2013 Maxime Bouroumeau-Fuseau
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DebugBar;

/**
 * HTTP driver for native php
 */
class PhpHttpDriver implements HttpDriverInterface
{
    function deleteSessionValue($name)
    {
        unset($_SESSION[$name]);
    }

    function getSessionValue($name)
    {
        return $_SESSION[$name];
    }

    function hasSessionValue($name)
    {
        return array_key_exists($name, $_SESSION);
    }

    function isSessionStarted()
    {
        return isset($_SESSION);
    }

    function setHeaders(array $headers)
    {
        foreach ($headers as $name => $value) {
            header("$name: $value");
        }
    }

    function setSessionValue($name, $value)
    {
        $_SESSION[$name] = $value;
    }
}
