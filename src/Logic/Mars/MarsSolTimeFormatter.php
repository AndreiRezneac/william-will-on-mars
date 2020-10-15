<?php


namespace App\Logic\Mars;


use App\Logic\Earth\EarthTime;

class MarsSolTimeFormatter implements DateTimeFormatter, EarthTime
{
    private const EARTH_TIME_LIKE = '%d:%d:%d.%d';

    public function format(float $marsSolTime, string $format = self::EARTH_TIME_LIKE)
    {
        $hours = floor($marsSolTime * self::HOURS_PER_DAY);
        $minutes = floor($marsSolTime * self::MINUTES_PER_DAY) % self::MINUTES_PER_HOUR;
        $seconds = floor($marsSolTime * self::SECONDS_PER_DAY) % self::SECONDS_PER_MINUTE;
        $milliseconds = floor($marsSolTime * self::MILLISECONDS_PER_DAY) % self::MILLISECONDS_PER_SECOND;

        return sprintf($format, $hours, $minutes, $seconds, $milliseconds);
    }
}
