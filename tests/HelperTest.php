<?php

namespace Tests;

use AsiaYo\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function testWithInvalidInput()
    {
        $this->assertEquals("Input should be number type!", Helper::f('test'));
    }

    public function testWithNumber()
    {
        $this->assertEquals("9,527", Helper::f(9527));
        $this->assertEquals("3,345,678", Helper::f(3345678));
        $this->assertEquals("-123.45", Helper::f(-123.45));
        $this->assertEquals("-123,678.45", Helper::f(-123678.45));
    }
}
