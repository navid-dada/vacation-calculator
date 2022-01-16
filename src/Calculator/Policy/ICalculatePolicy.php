<?php

namespace Calculator\Policy;

use Model\Employee;

interface ICalculatePolicy
{
    function Apply(Employee $employee, int $currentYear):float;
}