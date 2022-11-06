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

trait NotSet
{
    /**
     * Set enabled attribute.
     *
     * @param mixed $data
     * @param mixed $target
     * @param mixed $value
     *
     * @return collection
     */
    public function notSet($data = [], $target, $value)
    {
        if (!isset($data[$target])) {
            $data[$target] = $value;

            return $data;
        }

        return $data;
    }
}
