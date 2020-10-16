<?php


namespace App\Logic\Mars;


interface DateTimeFormatter
{
    public function format(float $dateTime, ?string $format = null): string;
}
