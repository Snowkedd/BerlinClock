<?php
class BerlinClock{

    public function giveTimeBerlinFirstLine(String $message) : string
    {
        $tabTime = str_split($message);
        $minutes = $this->giveMinute($tabTime);
        return $this->minuteToString($minutes);

    }

    public function giveMinute(Array $tabTime) : int
    {
        $tens = (int) $tabTime[3];
        $unit = (int) $tabTime[4];
        return ($tens*10) + $unit;
    }

    public function minuteToString(int $minutes) :string
    {
        if($minutes % 5 == 1) return "OXXX";
        if($minutes % 5 == 2) return "OOXX";
        if($minutes % 5 == 3) return "OOOX";
        if($minutes % 5 == 4) return "OOOO";
        return "XXXX";
    }

    public function giveTimeBerlinSecondLine(String $string) :string
    {
        $tabTime = str_split($string);
        $minutes = $this->giveMinute($tabTime);
        if(floor($minutes / 5) == 1) return "OXXXXXXXXXX";
        if(floor($minutes / 5) == 2) return "OOXXXXXXXXX";
        if(floor($minutes / 5) == 3) return "OORXXXXXXXX";
        return "XXXXXXXXXXX";

    }

}