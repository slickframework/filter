<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Filter;

/**
 * Filter Chain
 *
 * @package Slick\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class FilterChain implements FilterChainInterface
{

    /**
     * @var FilterInterface[]
     */
    protected $filters = [];

    /**
     * Add a filter to the chain
     *
     * @param FilterInterface $filter
     *
     * @return self|$this|FilterChainInterface
     */
    public function add(FilterInterface $filter)
    {
        array_push($this->filters, $filter);
        return $this;
    }

    /**
     * Returns the result of filtering $value
     *
     * @param mixed $value
     *
     * @throws Exception\CannotFilterValueException
     *      If filtering $value is impossible.
     *
     * @return mixed
     */
    public function filter($value)
    {
        $result = $value;
        foreach ($this->filters as $filter) {
            $result = $filter->filter($value);
            $value = $result;
        }
        return $result;
    }
}
