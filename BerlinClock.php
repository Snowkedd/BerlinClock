<?php
class BerlinClock{

    public function giveTimeBerlinFirstLine(String $message) : string
    {
        $tabTime = str_split($message);
        $minutes = $this->giveMinute($tabTime);
        return $this->timeToString($minutes);

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

    public function giveTimeFourthLine(String $string) :string
    {
        $tabTime = str_split($string);
        $hours = $this->giveHours($tabTime);
        return $this->timeFourthLine($hours);
    }

    public function giveTimeFifthLine(String $string) :string
    {
        $tabTime = str_split($string);
        $seconds = $this->giveSeconds($tabTime);
        if($seconds % 2 == 0) return "O";
        return "X";
    }

    public function giveSeconds(Array $tabTime) : int
    {
        $tens = (int) $tabTime[6];
        $unit = (int) $tabTime[7];
        return ($tens*10) + $unit;
    }

    public function giveMinute(Array $tabTime) : int
    {
        $tens = (int) $tabTime[3];
        $unit = (int) $tabTime[4];
        return ($tens*10) + $unit;
    }

    public function giveHours(Array $tabTime) : int
    {
        $tens = (int) $tabTime[0];
        $unit = (int) $tabTime[1];
        return ($tens*10) + $unit;
    }

    public function timeToString(int $time) :string
    {
        if($time % 5 == 1) return "OXXX";
        if($time % 5 == 2) return "OOXX";
        if($time % 5 == 3) return "OOOX";
        if($time % 5 == 4) return "OOOO";
        return "XXXX";
    }

    public function timeFourthLine(int $hours) :string
    {
        switch (floor($hours / 5)){
            case 1:
                return "OXXX";
            case 2:
                return "OOXX";
            case 3:
                return "OOOX";
            case 4:
                return "OOOO";
            default:
                return "XXXX";
        }
    }

    public function giveWholeBerlinClock(String $string) :string{
        $finalClock = "";
        $finalClock .= $this->giveTimeFifthLine($string) . "\n";
        $finalClock .= $this->giveTimeFourthLine($string) . "\n";
        $finalClock .= $this->giveTimeThirdLine($string) . "\n";
        $finalClock .= $this->giveTimeBerlinSecondLine($string) . "\n";
        $finalClock .= $this->giveTimeBerlinFirstLine($string);
        return $finalClock;
    }
}