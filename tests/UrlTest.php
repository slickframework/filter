<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Tests\Filter;

use PHPUnit_Framework_TestCase as TestCase;
use Slick\Filter\Url;

/**
 * Url filter test case
 *
 * @package Slick\Tests\Filter
 * @author  Filipe Silva <silvam.filipe@mail.com>
 */
class UrlTest extends TestCase
{

    /**
     * @var Url
     */
    protected $filter;

    /**
     * Creates the SUT URL filter object
     */
    protected function setUp()
    {
        parent::setUp();
        $this->filter = new Url();
    }

    /**
     * Should filter the URL out pf provided value
     * @test
     */
    public function filterUrl()
    {
        $expected = 'http://example.com/test';
        $value = 'http://example.com / test';
        $this->assertEquals($expected, $this->filter->filter($value));
    }
}
