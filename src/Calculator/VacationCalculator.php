<?php

namespace Calculator;

use Calculator\Policy\ICalculatePolicy;
use Model\Employee;

class VacationCalculator
{
    /**
     * @var ICalculatePolicy[]
     */
    private $policies = [] ;

    public function addPolicy(ICalculatePolicy $policy): VacationCalculator{
        $this->policies[] = $policy;
        return $this;
    }

    public function calculateVacation(Employee $employee, int $givenYear){
        $base = 0.0;
        foreach ($this->policies as $policy){
            $base+= $policy->apply($employee, $givenYear);
        }
        return $base;
    }

}