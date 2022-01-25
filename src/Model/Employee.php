<?php

namespace Model;

class Employee
{
    private string $name;
    private \DateTime $dateOfBirth ;
    private \DateTime $contractStartDate;
    private int $contractVacation;

    /**
     * @param string $name
     * @param string $dateOfBirth
     * @param string $contractStartDate
     * @param int $specialContract
     */
    public function __construct(string $name, string $dateOfBirth, string $contractStartDate, int $specialContract = 26)
    {
        $systemTimeZone = new \DateTimeZone(date_default_timezone_get()) ;
        $this->name = $name;
        try {
            $this->dateOfBirth = new \DateTime($dateOfBirth, $systemTimeZone);
            $this->contractStartDate = new \DateTime ($contractStartDate, $systemTimeZone);
        } catch (\Exception $e) {
            die("Wrong date format or value");
        }
        $this->contractVacation = $specialContract;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth(): \DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @return \DateTime
     */
    public function getContractStartDate(): \DateTime
    {
        return $this->contractStartDate;
    }

    /**
     * @return int
     */
    public function getContractVacation(): int
    {
        return $this->contractVacation;
    }

    public function  getAge(int $currentYear):int {
        $birthYear = intval($this->dateOfBirth->format('Y'));
        return $currentYear - $birthYear-1;
    }

    public function getExperience(int $currentYear) : Experience{
        $contractYear = $this->contractStartDate->format('Y');
        if ($contractYear === $currentYear){
            $referenceDate = new \DateTime($currentYear."-12-30");
        }
        else if ($contractYear <= $currentYear){
            $referenceDate = new \DateTime($currentYear."-01-01");
        }
        else {
            return Experience::Newcomer();
        }
        $diff = $referenceDate->diff($this->contractStartDate);
        return new Experience($diff->y, $diff->m);
    }

}