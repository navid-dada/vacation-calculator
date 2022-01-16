<?php

namespace Calculator\Policy;

use Model\Employee;

class AgeCalculatePolicy implements ICalculatePolicy
{

    function Apply(Employee $employee, int $currentYear): float
    {
        $cycles =intval($employee->getExperience($currentYear)->getYear()/5);
        if ($employee->getAge($currentYear) >= 30){
            return $cycles;
        }

        return 0 ;
    }
}