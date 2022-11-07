<?php
/**
 * Part of the Laravel Bootstrap package by Coder Studios.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the terms of the MIT license https://opensource.org/licenses/MIT
 *
 * @version    1.0.0
 *
 * @author     Coder Studios Ltd
 * @license    MIT https://opensource.org/licenses/MIT
 * @copyright  (c) 2022, Coder Studios Ltd
 *
 * @see       https://coderstudios.com
 */
if (!function_exists('ddSQL')) {
    function ddSQL($query)
    {
        if ('production' != config('app.env')) {
            if ($query->getBindings()) {
                dd(Str::replaceArray('?', $query->getBindings(), $query->toSql()));
            }
            dd($query->toSql());
        }
    }
}
