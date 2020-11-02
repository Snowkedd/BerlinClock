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

    public function test_berlinClock_given_3_minutes_should_return_3_O_and_1_X(){
        $actual = $this->actTime("00:03:00");
        $this->assertEquals("OOOX",$actual);
    }

    public function test_berlinClock_given_4_minutes_should_return_4_O_and_0_X(){
        $actual = $this->actTime("00:04:00");
        $this->assertEquals("OOOO",$actual);
    }

    public function test_berlinClock_given_5_minutes_should_return_0_O_and_4_X(){
        $actual = $this->actTime("00:05:00");
        $this->assertEquals("XXXX",$actual);
    }

    public function test_berlinClock_given_13_minutes_should_return_3_O_and_1_X(){
        $actual = $this->actTime("00:13:00");
        $this->assertEquals("OOOX",$actual);
    }


}
