<?php

namespace Model;

class Experience
{
    private int $year;
    private int $month;

    public function __construct(int $year, int $month)
    {
        $this->year = $year ;
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    public static function Newcomer () : Experience{
        return new Experience(0,0);
    }
}