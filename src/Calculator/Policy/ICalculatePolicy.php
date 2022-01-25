<?php

namespace Calculator\Policy;

use Model\Employee;

interface ICalculatePolicy
{
    function apply(Employee $employee, int $currentYear):float;
}