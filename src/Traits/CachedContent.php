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

trait CachedContent
{
    public function useCachedContent($key = '')
    {
        if (\Cache::has($key) && !session('errors') && !session('error') && !session('success')) {
            return \Cache::get($key);
        }
    }
}
