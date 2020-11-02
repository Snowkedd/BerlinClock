<?php
class BerlinClock{

    public function giveTimeBerlinFirstLine(String $message) : string
    {
        $tabTime = str_split($message);
        $minutes = $this->giveMinute($tabTime);
        return $this->timeToString($minutes);

    }

    public function giveMinute(Array $tabTime) : int
    {
        $tens = (int) $tabTime[3];
        $unit = (int) $tabTime[4];
        return ($tens*10) + $unit;
    }

    public function giveHours(Array $tabTime) : int
    {
        $tens = (int) $tabTime[6];
        $unit = (int) $tabTime[7];
        return ($tens*10) + $unit;
    }

    public function timeToString(int $minutes) :string
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

        $secondLine = "";
        $length = floor($minutes / 5);
        for($i = 1; $i <= $length; $i++){
            if($i % 3 == 0){
                $secondLine .= "R";
            }else{
                $secondLine .= "O";
            }
        }

        for($i = $length + 1; $i <= 11; $i++){
            $secondLine .= "X";
        }

        return $secondLine;
    }

    public function giveTimeThirdLine(String $string) :string
    {
        $tabTime = str_split($string);
        $hours = $this->giveHours($tabTime);
        return $this->timeToString($hours);
    }

}