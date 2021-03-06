<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Filter;

/**
 * Filter utility Interface
 *
 * @package Slick\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
interface FilterInterface
{

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
    public function filter($value);
}