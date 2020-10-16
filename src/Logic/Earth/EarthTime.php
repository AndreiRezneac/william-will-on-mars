<?php


namespace App\Logic\Earth;


interface EarthTime
{
    // the julian day number at 1/1/1970 0:00 UTC
    const JULIAN_DATE_AT_UNIX_EPOCH_START = 2440587.5;

    // basic constants
    const HOURS_PER_DAY = 24;
    const MINUTES_PER_HOUR = 60;
    const SECONDS_PER_MINUTE = 60;
    const MILLISECONDS_PER_SECOND = 1000;

    // derived / calculated constants
    const MINUTES_PER_DAY = self::HOURS_PER_DAY * self::MINUTES_PER_HOUR;
    const SECONDS_PER_DAY = self::MINUTES_PER_DAY * self::SECONDS_PER_MINUTE;
    const MILLISECONDS_PER_DAY = self::SECONDS_PER_DAY * self::MILLISECONDS_PER_SECOND;

    // Universal Coordinated Time
    const UTC = 'UTC';
}
