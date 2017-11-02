<?php

namespace Del\Phi\Exception;

use Exception;

class PhiException extends Exception
{
    const ERROR_NEGATIVE_NUMBER = "Don't pass a negative number, use setNegative().";
}