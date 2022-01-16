<?php
use Calculator\Policy\AgeCalculatePolicy;
use Model\Employee;
use PHPUnit\Framework\TestCase;

class AgeCalculatePolicyTest extends TestCase
{
    public function test_apply_employee_with_experience_less_than_5_years():void{
        $expected = 0 ;
        $employee = new Employee("Navid Shokri", "1988-09-09", "2008-08-15", 26) ;
        $sut = new AgeCalculatePolicy() ;
        //act
        $actual = $sut->Apply($employee, 2010);

        //assert
        $this->assertEquals($expected, $actual );
    }

    public function test_apply_employee_with_experience_more_than_5_years_but_under_30_years() : void{
        $expected = 0 ;
        $employee = new Employee("Navid Shokri", "1988-09-09", "2008-08-15", 26) ;
        $sut = new AgeCalculatePolicy() ;
        //act
        $actual = $sut->Apply($employee, 2016);

        //assert
        $this->assertEquals($expected, $actual );
    }

    public function test_apply_employee_with_experience_more_than_5_years_older_30_years() : void{
        $expected = 2 ;
        $employee = new Employee("Navid Shokri", "1988-09-09", "2008-08-15", 26) ;
        $sut = new AgeCalculatePolicy() ;
        //act
        $actual = $sut->Apply($employee, 2019);

        //assert
        $this->assertEquals($expected, $actual );
    }
}
