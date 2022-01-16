<?php
use Model\Employee;
use Model\Experience;
use Calculator\Policy\ExperienceCalculatePolicy;
use PHPUnit\Framework\TestCase;


class ExperienceCalculatePolicyTest extends TestCase
{
    public function test_experience_calculator_less_than_one_year():void{
        $expected = 13 ;
        $employee = new Employee("Navid Shokri", "1988-09-09", "2008-07-01", 26) ;
        $sut = new ExperienceCalculatePolicy() ;
        //act
        $actual = $sut->Apply($employee, 2008);

        //assert
        $this->assertEquals($expected, $actual );
    }

    public function test_experience_calculator_more_than_one_year(): void{
        $expected = 26 ;
        $employee = new Employee("Navid Shokri", "1988-09-09", "2008-07-01") ;
        $sut = new ExperienceCalculatePolicy() ;
        //act
        $actual = $sut->Apply($employee, 2010);

        //assert
        $this->assertEquals($expected, $actual );
    }
}
