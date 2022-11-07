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

namespace CoderStudios\LaravelBootstrap\Traits;

trait Key
{
    public function key($str = '', $prefix = '')
    {
        $user = '';
        if (\Auth::user()) {
            $user = '_'.\Auth::user()->id.'_';
        }

        return $prefix.md5(app()->request->getUri().'_'.$str.$user);
    }

    public function slugify($params)
    {
        $str = '';
        foreach ($params as $item) {
            if (is_array($item)) {
                foreach ($item as $i) {
                    $str .= $i.'-';
                }
            } else {
                $str .= $item.'-';
            }
        }

        return $str;
    }
}
