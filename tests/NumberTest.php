<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Tests\Filter;

use PHPUnit_Framework_TestCase as TestCase;
use Slick\Filter\Number;

/**
 * Number filter test case
 *
 * @package Slick\Tests\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class NumberTest extends TestCase
{

    /**
     * @var Number
     */
    protected $filter;

    /**
     * Creates the SUT number filter object
     */
    protected function setUp()
    {
        parent::setUp();
        $this->filter = new Number();
    }

    /**
     * Should filter the value and return an integer number
     * @test
     */
    public function filterNumber()
    {
        $number = $this->filter->filter('12.2');
        $this->assertEquals(122, $number);
    }
}
