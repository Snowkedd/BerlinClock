<?php

require "vendor/autoload.php";
require "BerlinClock.php";

use PHPUnit\Framework\TestCase;

class BerlinClockTest extends TestCase
{

    private BerlinClock $berlinClock;

    private function firstLine(String $string): string
    {
        return $this->berlinClock->giveTimeBerlinFirstLine($string);
    }
    private function secondLine(String $string): string
    {
        return $this->berlinClock->giveTimeBerlinSecondLine($string);
    }
    private function thirdLine(String $string): string
    {
        return $this->berlinClock->giveTimeThirdLine($string);
    }
    private function fourthLine(String $string): string
    {
        return $this->berlinClock->giveTimeFourthLine($string);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->berlinClock = new BerlinClock();
    }

    public function test_berlinClock_given_0_minute_sould_return_all_X(){
        $actual = $this->firstLine("00:00:00");
        $this->assertEquals("XXXX",$actual);
    }

    public function test_berlinClock_given_1_minute_should_return_1_O_and_3_X(){
        $actual = $this->firstLine("00:01:00");
        $this->assertEquals("OXXX",$actual);
    }

    public function test_berlinClock_given_2_minutes_should_return_2_O_and_2_X(){
        $actual = $this->firstLine("00:02:00");
        $this->assertEquals("OOXX",$actual);
    }

    public function test_berlinClock_given_3_minutes_should_return_3_O_and_1_X(){
        $actual = $this->firstLine("00:03:00");
        $this->assertEquals("OOOX",$actual);
    }

    public function test_berlinClock_given_4_minutes_should_return_4_O_and_0_X(){
        $actual = $this->firstLine("00:04:00");
        $this->assertEquals("OOOO",$actual);
    }

    public function test_berlinClock_given_5_minutes_should_return_0_O_and_4_X(){
        $actual = $this->firstLine("00:05:00");
        $this->assertEquals("XXXX",$actual);
    }

    public function test_berlinClock_given_13_minutes_should_return_3_O_and_1_X(){
        $actual = $this->firstLine("00:13:00");
        $this->assertEquals("OOOX",$actual);
    }

    public function test_berlinClock_given_00_minute_should_return_XXXXXXXXXXX(){
        $actual = $this->secondLine("00:00:00");
        $this->assertEquals("XXXXXXXXXXX",$actual);
    }

    public function test_berlinClock_given_5_minutes_should_return_OXXXXXXXXXX(){
        $actual = $this->secondLine("00:05:00");
        $this->assertEquals("OXXXXXXXXXX",$actual);
    }

    public function test_berlinClock_given_10_minutes_should_return_OOXXXXXXXXX(){
        $actual = $this->secondLine("00:10:00");
        $this->assertEquals("OOXXXXXXXXX",$actual);
    }

    public function test_berlinClock_given_17_minutes_should_return_OORXXXXXXXX(){
        $actual = $this->secondLine("00:17:00");
        $this->assertEquals("OORXXXXXXXX",$actual);
    }

    public function test_berlinClock_given_32_minutes_should_return_OOROORXXXXX(){
        $actual = $this->secondLine("00:32:00");
        $this->assertEquals("OOROORXXXXX",$actual);
    }

    public function test_berlinClock_given_56_minutes_should_return_OOROOROOROO(){
        $actual = $this->secondLine("00:56:00");
        $this->assertEquals("OOROOROOROO",$actual);
    }

    public function test_berlinClock_given_00_hours_should_return_XXXX(){
        $actual = $this->thirdLine("00:00:00");
        $this->assertEquals("XXXX",$actual);
    }

    public function test_berlinClock_given_01_hours_should_return_OXXX(){
        $actual = $this->thirdLine("01:00:00");
        $this->assertEquals("OXXX",$actual);
    }

    public function test_berlinClock_given_02_hours_should_return_OOXX(){
        $actual = $this->thirdLine("02:00:00");
        $this->assertEquals("OOXX",$actual);
    }

    public function test_berlinClock_given_06_hours_should_return_OXXX(){
        $actual = $this->thirdLine("06:00:00");
        $this->assertEquals("OXXX",$actual);
    }

    public function test_berlingClock_given_00_hours_should_return_XXXX(){
        $actual = $this->fourthLine("00:00:00");
        $this->assertEquals("XXXX",$actual);
    }

    public function test_berlingClock_given_05_hours_should_return_OXXX(){
        $actual = $this->fourthLine("05:00:00");
        $this->assertEquals("OXXX",$actual);
    }

    public function test_berlingClock_given_10_hours_should_return_OOXX(){
        $actual = $this->fourthLine("10:00:00");
        $this->assertEquals("OOXX",$actual);
    }

    public function test_berlingClock_given_20_hours_should_return_OOOO(){
        $actual = $this->fourthLine("20:00:00");
        $this->assertEquals("OOOO",$actual);
    }


}
