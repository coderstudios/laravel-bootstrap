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

namespace CoderStudios\LaravelBootstrap\Helpers;

class Dates
{
    public function firstDay($month, $year)
    {
        return date('w', mktime(0, 0, 0, $month, 1, $year));
    }

    public function lastDay($month, $year)
    {
        return date('t', mktime(0, 0, 0, $month, 1, $year));
    }

    public function getPreviousDates($months = 0, $start_year_month, $format = 'm-Y')
    {
        $dates = [];
        for ($i = -$months; $i < 0; ++$i) {
            $dates[] = date($format, strtotime("{$i} month", strtotime(date($start_year_month.'-15'))));
        }

        return $dates;
    }

    public function getMonths($start, $end, $format = 'n')
    {
        $start = (new \DateTime(date('Y-m-d', strtotime($start))))->modify('first day of this month');
        $end = (new \DateTime(date('Y-m-d', strtotime($end))))->modify('first day of next month');
        $interval = \DateInterval::createFromDateString('1 month');
        $period = new \DatePeriod($start, $interval, $end);

        $months = [];
        foreach ($period as $dt) {
            $months[] = $dt->format($format);
        }

        return $months;
    }

    public function weeksInAMonth($month, $year)
    {
        $firstday = $this->firstDay($month, $year);
        $lastday = $this->lastDay($month, $year);

        return 1 + ceil(($lastday - 8 + $firstday) / 7);
    }

    public function currentWeekFromDate($date)
    {
        return ceil((date('d', strtotime($date)) - date('w', strtotime($date)) - 1) / 7) + 1;
    }

    public function daysInMonth($date)
    {
        return cal_days_in_month(CAL_GREGORIAN, date('n', strtotime($date)), date('Y', strtotime($date)));
    }

    public function startDateOfWeek($week, $year)
    {
        $time = strtotime("1 January {$year}", time());
        $day = date('w', $time);
        $time += ((7 * $week) + 1 - $day) * 24 * 3600;

        return date('Y-m-d', $time);
    }

    public function endDateOfWeek($week, $year)
    {
        $time = strtotime("1 January {$year}", time());
        $day = date('w', $time);
        $time += ((7 * $week) + 1 - $day) * 24 * 3600;
        $time += 6 * 24 * 3600;

        return date('Y-m-d', $time);
    }

    public function getMonthName($format = 'M', $month = '')
    {
        if (empty($month)) {
            $month = date('m');
        }

        return date($format, strtotime('2022-'.$month.'-1'));
    }
}
