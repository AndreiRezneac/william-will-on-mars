<?php


namespace App\Logic\Mars;


use App\Logic\Earth\EarthTimeCalculator;

interface MarsTimeCalculator extends EarthTimeCalculator
{
    /**
     * a starting date for the Martian epoch was needed
     *
     * Michael Allison from NASA and Megan McEwen from Columbia University proposed 12:00 December 29th, 1873
     * due to the near coincidence of solar midnight on both Earth and Mars on that date.
     * This is the date NASA uses.
     *
     * JDtt datetime
     */
    const MARTIAN_EPOCH_START_JD_TT = 2405522.0028779;

    // Earth days per Martian day (sols)
    const EARTH_DAYS_PER_SOL = 1.0274912517;
}
