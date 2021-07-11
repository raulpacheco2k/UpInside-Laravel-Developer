<?php

if (! function_exists('isActive')) {

    /**
     * @param $href
     * @param string $class
     * @return string
     */
    function isActive($href, string $class = 'active'): string
    {
        return (str_starts_with(Route::currentRouteName(), $href) ? $class : '');
    }
}
