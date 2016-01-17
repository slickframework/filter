<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Tests\Filter;

use PHPUnit_Framework_TestCase as TestCase;
use Slick\Filter\StaticFilter;

/**
 * Static Filter test case
 *
 * @package Slick\Tests\Filter
 * @author  Filipe Silva <silvam.filpe@gmail.com>
 */
class StaticFilterTest extends TestCase
{

    /**
     * Should throw an exception
     * @test
     * @expectedException \Slick\Filter\Exception\InvalidArgumentException
     */
    public function createUnknownFilter()
    {
        StaticFilter::create('_test_filter_');
    }

    /**
     * Should throw an exception
     * @test
     * @expectedException \Slick\Filter\Exception\InvalidArgumentException
     */
    public function createInvalidFilter()
    {
        StaticFilter::create('stdClass');
    }

    /**
     * Should create the filter mapped to the alias name
     * @test
     */
    public function createKnownFilter()
    {
        $filter = StaticFilter::create('text');
        $this->assertInstanceOf('Slick\Filter\Text', $filter);
    }

    /**
     * Should run the filter passed in the alias over the provided value
     * @test
     */
    public function filterStatically()
    {
        $this->assertEquals(123, StaticFilter::filter('number', '12.3'));
    }
}
