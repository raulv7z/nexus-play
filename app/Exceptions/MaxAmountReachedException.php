<?php

namespace App\Exceptions;

use Exception;

class MaxAmountReachedException extends Exception
{
    //
    private $limit;

    public function __construct($message = null)
    {
        $this->limit = 1000;
        $message = $message ?? "You have reached the maximum amount of the shopping cart. (($this->limit) EUR)";
        parent::__construct($message);
    }
}