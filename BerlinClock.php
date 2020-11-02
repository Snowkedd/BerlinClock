<?php
class BerlinClock{

    public function giveTimeBerlin(String $message) : string
    {
        $tabTime = str_split($message);
        $minutes = $this->giveMinute($tabTime);

        if($minutes % 5 == 1) return "OXXX";
        return "XXXX";
    }

    public function giveMinute(Array $tabTime) : int
    {
        $tens = (int) $tabTime[3];
        $unit = (int) $tabTime[4];
        return ($tens*10) + $unit;
    }


}