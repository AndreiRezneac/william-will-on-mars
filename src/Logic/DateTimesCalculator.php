<?php


namespace App\Logic;


use App\Logic\DTO\DateTimes;
use DateTimeInterface;

interface DateTimesCalculator
{
    public function calculate(DateTimeInterface $dateTime): DateTimes;
}
