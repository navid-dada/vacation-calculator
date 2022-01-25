<?php

namespace Calculator\Policy;

use Model\Employee;

class ExperienceCalculatePolicy implements ICalculatePolicy
{

    function apply(Employee $employee, int $currentYear): float
    {
        $experience = $employee->getExperience($currentYear) ;
        if($experience->getYear() > 0){
            return $employee->getContractVacation();
        }
        return ($experience->getMonth()/12)*$employee->getContractVacation();
    }
}