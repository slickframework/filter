<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Tests\Filter;

use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit_Framework_TestCase as TestCase;
use Slick\Filter\FilterChain;
use Slick\Filter\FilterInterface;

/**
 * Filter Chain test case
 *
 * @package Slick\Tests\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class FilterChainTest extends TestCase
{

    /**
     * @var FilterChain
     */
    protected $chain;

    /**
     * Sets up the SUT filter chain object
     */
    protected function setUp()
    {
        parent::setUp();
        $this->chain = new FilterChain();
    }

    /**
     * Should apply the filter on top of the previous result through
     * the filter chain.
     * @test
     */
    public function filter()
    {
        $value = 'test';
        $filter = $this->createFilterMock();
        $filter->expects($this->once())
            ->method('filter')
            ->with($value)
            ->willReturn(ucfirst($value));
        $this->chain->add($filter);
        $this->assertEquals('Test', $this->chain->filter($value));
    }

    /**
     * Gets a mocked service
     * @return MockObject|FilterInterface
     */
    protected function createFilterMock()
    {
        $class = 'Slick\Filter\FilterInterface';
        $methods = ['filter'];
        /** @var FilterInterface|MockObject $filter */
        $filter = $this->getMockBuilder($class)
            ->setMethods($methods)
            ->getMock();
        return $filter;
    }
}
