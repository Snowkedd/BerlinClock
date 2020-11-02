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

    public function test_berlinClock_given_1_minute_should_return_1_O_and_3_X(){
        $actual = $this->actTime("00:01:00");
        $this->assertEquals("OXXX",$actual);
    }

    public function test_berlinClock_given_2_minutes_should_return_2_O_and_2_X(){
        $actual = $this->actTime("00:02:00");
        $this->assertEquals("OOXX",$actual);
    }

}
