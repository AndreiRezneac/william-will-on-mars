<?php


namespace App\Logic\DTO;


use App\Logic\Earth\EarthTime;
use App\Logic\Mars\MarsTime;

class UtcMtcMsdDateTimes implements DateTimes
{
    /**
     * (Earth) Gregorian UTC
     * @var string
     */
    private $utc;

    /**
     * (Mars) MTC
     * @var string
     */
    private $mtc;

    /**
     * (Mars) MSD
     * @var string
     */
    private $msd;

    public function __construct(string $utc, string $mtc, string $msd)
    {
        $this->utc = $utc;
        $this->mtc = $mtc;
        $this->msd = $msd;
    }

    public function __toString(): string
    {
        return json_encode([
            EarthTime::UTC => $this->utc,
            MarsTime::MTC => $this->mtc,
            MarsTime::MSD => $this->msd
        ]);
    }
}
