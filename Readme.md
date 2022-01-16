## Vacation calculator
This app is a console application to calculate the employees vacations based on their age and experiences.

### Assumptions

1- Complete year is taken as age. for example if someone is born in 2000-06-01, she/he age is 9 years old at 2009-12-30.

2- If Given year is in same year with start of contract, application calculate it on end of that year. If given year is greater than year of start of contract it will calculate at start of year.

### Run 

> php src/vaccal.php [GIVEN_YEAR]

### test 

> ./vendor/bin/phpunit Test