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

    public function __construct()
    {

    }

    public function AddPolicy(ICalculatePolicy $policy): VacationCalculator{
        $this->policies[] = $policy;
        return $this;
    }

    public function CalculateVacation(Employee $employee, int $givenYear){
        $base = 0.0;
        foreach ($this->policies as $policy){
            $base+= $policy->Apply($employee, $givenYear);
        }
        return $base;
    }

}