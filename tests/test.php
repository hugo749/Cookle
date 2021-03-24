<?php

namespace Cookle\tests\test;

use Cookle\tests\test;
use PHPUnit\Framework\TestCase;

class tests extends TestCase
{
    public function testadd()
    {
        $evaluation = new calcAverageEval();
        $result = $evaluation->add(4);

        $this -> assertEquals(4, $result);
    }
}