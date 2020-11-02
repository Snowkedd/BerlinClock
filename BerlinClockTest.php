<?php

require "vendor/autoload.php";
require "BerlinClock.php";

use PHPUnit\Framework\TestCase;

class BerlinClockTest extends TestCase
{

    private BerlinClock $berlinClock;

    private function actTime(String $string): string
    {
        return $this->berlinClock->giveTimeBerlin($string);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->berlinClock = new BerlinClock();
    }

    public function test_berlinClock_given_0_minute_sould_return_all_X(){
        $actual = $this->actTime("00:00:00");
        $this->assertEquals("XXXX",$actual);
    }

}
