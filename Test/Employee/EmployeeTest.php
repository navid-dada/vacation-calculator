<?php
//require '../../autoload.php';
use Model\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function test_success_construct():void{
        //arrange
        $name = "Navid Shokri";
        $birthdate = "1988-09-09";
        $contractVacation ="26";
        $startOfContract = "2008-08-15";

        //act
        $sut = new Employee($name, $birthdate, $startOfContract, $contractVacation) ;

        //assert
        $this->assertEquals($name,$sut->getName());
        $this->assertEquals($birthdate,$sut->getDateOfBirth()->format("Y-m-d"));
        $this->assertEquals($startOfContract,$sut->getContractStartDate()->format("Y-m-d"));
        $this->assertEquals($contractVacation,$sut->getContractVacation());
    }


    public function test_employee_getAge():void{
        //arrange
        $expectedAge = 31 ;
        $name = "Navid Shokri";
        $birthdate = "1988-09-09";
        $contractVacation ="26";
        $startOfContract = "2008-08-15";
        $sut = new Employee($name, $birthdate, $startOfContract, $contractVacation) ;

        //act
       $actualAge = $sut->getAge(2020);

        //assert
        $this->assertEquals($expectedAge, $actualAge);
    }


    public function test_employee_getExperience_below_one_year():void{
        //arrange
        $expectedExperienceYear = 0 ;
        $expectedExperienceMonth = 4;
        $name = "Navid Shokri";
        $birthdate = "1988-09-09";
        $contractVacation ="26";
        $startOfContract = "2008-08-15";
        $sut = new Employee($name, $birthdate, $startOfContract, $contractVacation) ;

        //act
        $actualExperience = $sut->getExperience(2009);

        //assert
        $this->assertEquals($expectedExperienceYear, $actualExperience->getYear());
        $this->assertEquals($expectedExperienceMonth, $actualExperience->getMonth());
    }

    public function test_employee_getExperience_after_one_year():void{
        //arrange
        $expectedExperienceYear = 1 ;
        $expectedExperienceMonth = 4;
        $name = "Navid Shokri";
        $birthdate = "1988-09-09";
        $contractVacation ="26";
        $startOfContract = "2008-08-15";
        $sut = new Employee($name, $birthdate, $startOfContract, $contractVacation) ;

        //act
        $actualExperience = $sut->getExperience(2010);

        //assert
        $this->assertEquals($expectedExperienceYear, $actualExperience->getYear());
        $this->assertEquals($expectedExperienceMonth, $actualExperience->getMonth());
    }

}
