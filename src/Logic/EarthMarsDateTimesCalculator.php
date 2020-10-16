<?php


namespace App\Logic;


use App\Logic\DTO\DateTimes;
use App\Logic\DTO\UtcMtcMsdDateTimes;
use App\Logic\Earth\EarthTimeCalculator;
use App\Logic\Mars\DateTimeFormatter;
use App\Logic\Mars\MarsTimeCalculator;
use DateTimeInterface;

class EarthMarsDateTimesCalculator implements DateTimesCalculator
{
    /**
     * @var EarthTimeCalculator
     */
    private $terrestrialTimeCalculator;

    /**
     * @var MarsTimeCalculator
     */
    private $marsCoordinatedTimeCalculator;

    /**
     * @var MarsTimeCalculator
     */
    private $marsSolTimeCalculator;

    /**
     * @var DateTimeFormatter
     */
    private $marsSolTimeFormatter;

    public function __construct(
        EarthTimeCalculator $terrestrialTimeCalculator,
        MarsTimeCalculator $marsCoordinatedTimeCalculator,
        MarsTimeCalculator $marsSolTimeCalculator,
        DateTimeFormatter $marsSolTimeFormatter)
    {
        $this->terrestrialTimeCalculator = $terrestrialTimeCalculator;
        $this->marsCoordinatedTimeCalculator = $marsCoordinatedTimeCalculator;
        $this->marsSolTimeCalculator = $marsSolTimeCalculator;
        $this->marsSolTimeFormatter = $marsSolTimeFormatter;
    }

    public function calculate(DateTimeInterface $gregorianUtc): DateTimes
    {
        $gregorianUtcInMilliseconds = $this->getDateTimeInMilliseconds($gregorianUtc);
        $terrestrialTime = $this->terrestrialTimeCalculator->calculate($gregorianUtcInMilliseconds);
        $marsCoordinatedTime = $this->marsCoordinatedTimeCalculator->calculate($terrestrialTime);
        $marsSolTime = $this->marsSolTimeCalculator->calculate($marsCoordinatedTime);

        return new UtcMtcMsdDateTimes(
            $gregorianUtc->format(DateTimeInterface::RFC3339_EXTENDED),
            (string)$marsCoordinatedTime,
            $this->marsSolTimeFormatter->format($marsSolTime)
        );
    }

    private function getDateTimeInMilliseconds(DateTimeInterface $gregorianUtc) {
        $millisecondsOnly = intval($gregorianUtc->format('v'));

        return $gregorianUtc->getTimestamp() * 1000 + $millisecondsOnly;
    }
}
