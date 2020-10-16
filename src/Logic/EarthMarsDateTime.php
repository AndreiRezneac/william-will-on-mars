<?php


namespace App\Logic;


use App\Logic\Earth\EarthTime;
use App\Logic\Mars\MarsTime;

class EarthMarsDateTime
{
    /**
     * @var string
     */
    private $utc;

    /**
     * @var string
     */
    private $mtc;

    /**
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
