<?php

namespace DelTesting\Phi;

use Codeception\TestCase\Test;
use Del\Phi\Fraction;

class PhiTest extends Test
{
    public function testGettersAndSetters()
    {
        $phi = new Fraction();
        $phi->setWhole(2);
        $phi->setNumerator(2);
        $phi->setDenominator(3);

        $this->assertEquals(2, $phi->getWhole());
        $this->assertEquals(2, $phi->getNumerator());
        $this->assertEquals(3, $phi->getDenominator());
    }

    public function testToString()
    {
        $phi = new Fraction();

        // Add cases which will break it if you can!
        $dataset = [
            [2,2,3,'2 2/3'],
            [0,3,4,'3/4'],
        ];

        foreach ($dataset as $row) {
            $phi->setWhole($row[0]);
            $phi->setNumerator($row[1]);
            $phi->setDenominator($row[2]);
            $this->assertEquals($row[3], $phi->__toString());
        }
    }

    public function testToDecimal()
    {
        $phi = new Fraction();

        // Add cases which will break it if you can!
        $dataset = [
            [2,2,3,2.66666666666],
            [0,3,4,0.75],
        ];

        foreach ($dataset as $row) {
            $phi->setWhole($row[0]);
            $phi->setNumerator($row[1]);
            $phi->setDenominator($row[2]);
            $this->assertEquals($row[3], $phi->toDecimal());
        }
    }
}
