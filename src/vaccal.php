<?php
include "../vendor/autoload.php";

use Calculator\Policy\AgeCalculatePolicy;
use Calculator\Policy\ExperienceCalculatePolicy;
use Calculator\VacationCalculator;
use Model\Employee;

if (!isset($argv) || count($argv)<2)
{
    die("Please enter reference year!!!");
}
if (!is_numeric($argv[1]))
{
    die("Given parameter cannot represent a year!!!");
}
$currentYear =intval($argv[1]);
$employees = array(
 new Employee("Hans Muller", "30.12.1970", "01.01.2001"),
 new Employee("Angelika Fringe", "09.06.1976", "15.01.2001"),
 new Employee("Peter Klever", "12.07.1991", "15.05.2016"),
 new Employee("Marina Helter", "26.01.1970", "15.01.2018"),
 new Employee("Sepp Meier", "23.05.1980", "01.12.2017")
);

$calculator = new VacationCalculator();
$calculator
    ->AddPolicy(new ExperienceCalculatePolicy())
    ->AddPolicy(new AgeCalculatePolicy());

foreach ($employees as $employee){
    $vacationCount  = $calculator->CalculateVacation($employee, $currentYear);
    echo $employee->getName() . ' has '. $vacationCount . ' days vacations.'.PHP_EOL;
}
