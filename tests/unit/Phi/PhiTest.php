<?php

namespace DelTesting\Phi;

use Codeception\TestCase\Test;
use Del\Phi\Fraction;
use Del\Phi\Exception\PhiException;

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
            [3,3,3,'4'],
            [0,3,3,'1'],
            [0,8,4,'2'],
            [0,6,12,'1/2'],
            [0,9,8,'1 1/8'],
            [4,0,4,'4'],
            [0,0,0,'0'],
            [0,0,4,'0'],
            [0,5,0,'0'],
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
            [3,3,3,4],
            [0,3,3,1],
            [0,8,4,2],
            [0,6,12,0.5],
            [4,0,4,4],
        ];

        foreach ($dataset as $row) {
            $phi->setWhole($row[0]);
            $phi->setNumerator($row[1]);
            $phi->setDenominator($row[2]);
            $this->assertEquals($row[3], $phi->toDecimal());
        }
    }

    public function testIsInteger()
    {
        $phi = new Fraction();

        // Add cases which will break it if you can!
        $dataset = [
            [2,2,3,false],
            [0,3,4,false],
            [3,3,3,true],
            [0,3,3,true],
            [0,8,4,true],
            [0,6,12,false],
        ];

        foreach ($dataset as $row) {
            $phi->setWhole($row[0]);
            $phi->setNumerator($row[1]);
            $phi->setDenominator($row[2]);
            $this->assertEquals($row[3], $phi->isInteger());
        }
    }

    public function testPassingNegativeWholeThrowsException()
    {
        $this->expectException(PhiException::class);
        $this->expectExceptionMessage(PhiException::ERROR_NEGATIVE_NUMBER);
        $phi = new Fraction();
        $phi->setWhole(-3);
    }

    public function testPassingNegativeNumeratorThrowsException()
    {
        $this->expectException(PhiException::class);
        $this->expectExceptionMessage(PhiException::ERROR_NEGATIVE_NUMBER);
        $phi = new Fraction();
        $phi->setNumerator(-3);
    }

    public function testPassingNegativeDenominatorThrowsException()
    {
        $this->expectException(PhiException::class);
        $this->expectExceptionMessage(PhiException::ERROR_NEGATIVE_NUMBER);
        $phi = new Fraction();
        $phi->setDenominator(-3);
    }

    public function testSetNegative()
    {
        $phi = new Fraction();
        $this->assertFalse($phi->isNegative());
        $phi->setNegative(true);
        $this->assertTrue($phi->isNegative());
        $phi->setNegative(false);
        $this->assertFalse($phi->isNegative());

        $dataset = [
            [2,2,3,'-2 2/3'],
            [0,3,4,'-3/4'],
            [3,3,3,'-4'],
            [0,3,3,'-1'],
            [0,8,4,'-2'],
            [0,6,12,'-1/2'],
            [0,9,8,'-1 1/8'],
            [4,0,4,'-4'],
            [0,0,0,'0'],
            [0,0,4,'0'],
            [0,5,0,'0'],
        ];

        foreach ($dataset as $row) {
            $phi->setNegative(true);
            $phi->setWhole($row[0]);
            $phi->setNumerator($row[1]);
            $phi->setDenominator($row[2]);
            $this->assertEquals($row[3], $phi->__toString());
        }
    }
}
