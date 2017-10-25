<?php

namespace Del\Phi;

class Fraction
{
    /** @var int $whole */
    private $whole;

    /** @var int $numerator */
    private $numerator;

    /** @var int $denominator */
    private $denominator;

    /** @var bool $negative */
    private $negative;

    public function __construct($whole = 0, $numerator = 0, $denominator = 1)
    {
        $this->whole = $whole;
        $this->numerator = $numerator;
        $this->denominator = $denominator;
        $this->negative = false;
    }

    /**
     * @return int
     */
    public function getWhole()
    {
        return $this->whole;
    }

    /**
     * @param int $whole
     * @return Fraction
     */
    public function setWhole($whole)
    {
        $this->whole = $whole;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumerator()
    {
        return $this->numerator;
    }

    /**
     * @param int $numerator
     * @return Fraction
     */
    public function setNumerator($numerator)
    {
        $this->numerator = $numerator;
        return $this;
    }

    /**
     * @return int
     */
    public function getDenominator()
    {
        return $this->denominator;
    }

    /**
     * @param int $denominator
     * @return Fraction
     */
    public function setDenominator($denominator)
    {
        $this->denominator = $denominator;
        return $this;
    }

    private function refactor()
    {
        // 9/8 would become 1 1/8 for instance
        if ($this->numerator >= $this->denominator && $this->denominator > 0) {
            $this->refactorWhole();
        }
        if ($this->numerator > 0 && $this->denominator > 0) {
            $this->refactorFraction();
        }
    }

    private function refactorWhole()
    {
        // decrement $x and the numerator by the denominator each loop, and add to the whole
        for ($x = $this->numerator; $x >= $this->denominator; $x = $x - $this->denominator) {
            $this->whole ++;
            $this->numerator -= $this->denominator;
        }
    }

    private function refactorFraction()
    {
        $gcd = $this->getGreatestCommonDenominator($this->numerator, $this->denominator);
        $this->numerator = $this->numerator / $gcd;
        $this->denominator = $this->denominator / $gcd;
    }

    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    private function getGreatestCommonDenominator($x, $y)
    {
        // first get the common denominators of both numerator and denominator
        $factorsX = $this->getFactors($x);
        $factorsY = $this->getFactors($y);

        // common denominators will be in both arrays, so get the intersect
        $commonDenominators = array_intersect($factorsX, $factorsY);

        // greatest common denominator is the highest number (last in the array)
        $gcd = array_pop($commonDenominators);

        return $gcd;
    }

    /**
     * @param int $num
     * @return array The common denominators of $num
     */
    private function getFactors($num)
    {
        $factors = [];
        // get factors of the numerator
        for ($x = 1; $x <= $num; $x ++) {
            if ($num % $x == 0) {
                $factors[] = $x;
            }
        }
        return $factors;
    }

    /**
     * @return bool
     */
    public function isNegative()
    {
        return $this->negative;
    }

    /**
     * @param bool $negative
     * @return Fraction
     */
    public function setNegative($negative)
    {
        $this->negative = $negative;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInteger()
    {
        return $this->numerator % $this->denominator == 0;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $this->refactor();

        // if the whole is 0, don't display it
        $whole = $this->whole == 0 ? '' : $this->whole;
        $fraction = $this->numerator > 0 ? $this->numerator.'/'.$this->denominator : '';
        $space = ($whole && $fraction) ? ' ' : '';

        return $whole.$space.$fraction;
    }

    /**
     * @return float
     */
    public function toDecimal()
    {
        /*
         * a divide symbol. so this is broken and will need refactoring to be accurate. ;-)
         */
        $decimal = $this->numerator / $this->denominator;
        $number =  $this->whole + $decimal;
        return $number;
    }
}