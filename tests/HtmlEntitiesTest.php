<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Tests\Filter;

use PHPUnit_Framework_TestCase as TestCase;
use Slick\Filter\HtmlEntities;

/**
 * Html Entities filter test case
 *
 * @package Slick\Tests\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class HtmlEntitiesTest extends TestCase
{

    /**
     * @var HtmlEntities
     */
    protected $filter;

    /**
     * Create the SUT html entities filter object
     */
    protected function setUp()
    {
        parent::setUp();
        $this->filter = new HtmlEntities();
    }

    /**
     * Should convert special characters tho html entities
     * @test
     */
    public function filterHtmlEntities()
    {
        $values = '&';
        $expected = '&amp;';
        try {
            $this->assertEquals($expected, $this->filter->filter($values));
        } catch (\Exception $caught) {
            $this->assertEquals('&#38;', $this->filter->filter($values));
        }
    }
}
