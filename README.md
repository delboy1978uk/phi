# phi
[![Build Status](https://travis-ci.org/delboy1978uk/phi.png?branch=master)](https://travis-ci.org/delboy1978uk/phi) [![Code Coverage](https://scrutinizer-ci.com/g/delboy1978uk/phi/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/phi/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/delboy1978uk/phi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/phi/?branch=master) <br />
Floats suck. So lets make an analogue fractional calculator. Join in!
### v0.0.5
Refactoring fractions (apparently) works! We might need more test cases. Help us add some!
## install the project
First fork the project on GitHub. Then, 
```
git clone https://github.com/your-github-name/phi
cd phi
composer install
```
## run the tests
```
codecept run unit --coverage-html
```
Or you can log into https://travis-ci.org/ and hook up your forked repository. 
Then by git pushing the tests will run. 
## do your thing
You either build, break, or fix. Get the test passing, or add a new set of data 
which will make the tests fail. 
#### new feature
We have a `setNegative($bool)` method for negative fractions. We haven't added any test cases
for that, so why not join in the fun? :-) 
#### adding a test case
In `tests/unit/Phi/PhiTest.php` you can see the `testToString()` test. There is a dataset, each being
an array with four values; the whole, the numerator, the denominator, and the expected string output.
Contributing can be as simple as throwing some numbers in there and try to break the class!
## send your pull request
Because contributing to open source is fun!
## usage
Right now, there is only one class, `Del\Phi\Fraction`. An object representing a fraction, comprising
of a whole number, and fractional numerator and denominator.
```php
<?php 

use Del\Phi\Fraction;

$phi = new Fraction();
$phi->setWhole(3)
    ->setNumerator(3)
    ->setDenominator(4);

echo $phi->toDecimal(); // float 3.75
echo $phi;              // string '3 3/4'
```
More functionality will be made soon, but first we need tests which will break the current logic 
and give us unexpected output! (for example '3 3/3' should really output 4) 