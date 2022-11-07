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

namespace CoderStudios\LaravelBootstrap\Libraries;

class BreadcrumbLibrary
{
    protected $items = [];

    public function addBreadcrumb($text, $href = '', $active = '', $class = '', $parent_class = '', $separator = ' &gt; ', $group = '')
    {
        if ($group) {
            $this->items[$group][] = [
                'text' => $text,
                'href' => $href,
                'active' => $active,
                'class' => $class,
                'parent_class' => $parent_class,
                'separator' => $separator,
            ];
        } else {
            $this->items[] = [
                'text' => $text,
                'href' => $href,
                'active' => $active,
                'class' => $class,
                'parent_class' => $parent_class,
                'separator' => $separator,
            ];
        }
    }

    public function getBreadcrumbItems($group = '')
    {
        if ($group) {
            $items = $this->items[$group] ?? null;
        } else {
            $items = $this->items ?? null;
        }

        return $items;
    }

    public function getBreadcrumb($group = '')
    {
        $items = $this->getBreadcrumbItems($group);
        if (empty($items) || empty($group)) {
            return null;
        }
        $html = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';

        $count = 1;
        foreach ($items as $item) {
            $active = $parent_class = '';
            if (isset($item['active']) && true === $item['active']) {
                $active = 'active';
            }
            if (isset($item['class']) && !empty($item['class'])) {
                $class = $item['class'];
            }
            if (isset($item['parent_class']) && !empty($item['parent_class'])) {
                $parent_class = $item['parent_class'];
            }
            $html .= '<li class="breadcrumb-item '.$active.' '.$parent_class.'">';
            if (!empty($item['href'])) {
                $html .= '<a href="'.$item['href'].'" class="'.$class.'">';
            }
            $html .= $item['text'];
            if (!empty($item['href'])) {
                $html .= '</a>';
            }
            $html .= '</li>';
            if ($count < count($items)) {
                $html .= '<li>'.$item['separator'].'</li>';
            }
            ++$count;
        }
        $html .= '</ol></nav>';

        return $html;
    }
}
