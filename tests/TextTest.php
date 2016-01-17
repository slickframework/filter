<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Tests\Filter;

use PHPUnit_Framework_TestCase as TestCase;
use Slick\Filter\Text;

/**
 * Text filter test case
 *
 * @package Slick\Tests\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class TextTest extends TestCase
{

    /**
     * @var Text
     */
    protected $filter;

    /**
     * Creates the SUT text filter object
     */
    protected function setUp()
    {
        parent::setUp();
        $this->filter = new Text();
    }

    /**
     * Should filter the input to text
     * @test
     */
    public function filterText()
    {
        $text = $this->filter->filter(123.1);
        $this->assertTrue(is_string($text));
        $this->assertEquals("123.1", $text);
    }
}
