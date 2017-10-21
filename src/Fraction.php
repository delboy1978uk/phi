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
        $whole = $this->whole == 0 ? '' : $this->whole.' ';
        return $whole.$this->numerator.'/'.$this->denominator;
    }

    /**
     * @return float
     */
    public function toDecimal()
    {
        /*
         * a divide symbol. so this is broken and will need refactoring to be accurate. ;-)
         */
        return $this->whole + ($this->numerator / $this->denominator);
    }
}