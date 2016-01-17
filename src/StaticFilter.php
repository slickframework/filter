<?php

/**
 * This file is part of slick/filter package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\Filter;

use Slick\Filter\Exception\InvalidArgumentException;

/**
 * Static Filter: Filter factory utility
 *
 * @package Slick\Filter
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
final class StaticFilter
{

    /**
     * @var array List of available filter
     */
    public static $filters = [
        'text'         => 'Slick\Filter\Text',
        'htmlEntities' => 'Slick\Filter\HtmlEntities',
        'number'       => 'Slick\Filter\Number',
        'url'          => 'Slick\Filter\Url'
    ];

    /**
     * Creates the filter in the alias or class name and applies it to the
     * provided value.
     *
     * @param string $alias Filter alias or FQ class name
     * @param mixed  $value Value to filter
     *
     * @throws InvalidArgumentException If the class does not exists or if
     *      class does not implements the FilterInterface.
     *
     * @return mixed
     */
    public static function filter($alias, $value)
    {
        $filter = self::create($alias);
        return $filter->filter($value);
    }

    /**
     * Creates the filter object for provided alias or FQ class name
     *
     * @param string $filter Filter alias od FQ class name
     *
     * @throws InvalidArgumentException If the class does not exists or if
     *      class does not implements the FilterInterface.
     *
     * @return FilterInterface
     */
    public static function create($filter)
    {
        $class = self::getClass($filter);
        self::checkFilter($class);
        return new $class();
    }

    /**
     * Returns the class name for provided alias
     *
     * @param string $alias The FQ class name or one of known filter alias
     * @return string
     *
     * @throws InvalidArgumentException If the class does not exists.
     */
    protected static function getClass($alias)
    {
        if (array_key_exists($alias, self::$filters)) {
            return self::$filters[$alias];
        }

        if (!class_exists($alias)) {
            throw new InvalidArgumentException(
                "Class {$alias} does not exists."
            );
        }
        return $alias;
    }

    /**
     * Verifies is provided class implements the FilterInterface interface
     *
     * @param string $class
     *
     * @throws InvalidArgumentException
     *      If the class does not implements the interface.
     */
    protected static function checkFilter($class)
    {
        if (!is_subclass_of($class, 'Slick\Filter\FilterInterface')) {
            throw new InvalidArgumentException(
                "Class {$class} does not implements the ".
                "Slick\\Filter\\FilterInterface interface."
            );
        }
    }
}
