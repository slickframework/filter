<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Filter;

/**
 * Filter Chain Interface
 *
 * @package Slick\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
interface FilterChainInterface extends FilterInterface
{

    /**
     * Add a filter to the chain
     *
     * @param FilterInterface $filter
     *
     * @return self|$this|FilterChainInterface
     */
    public function add(FilterInterface $filter);
}