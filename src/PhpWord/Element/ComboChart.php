<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @see         https://github.com/PHPOffice/PHPWord
 *
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style\Chart as ChartStyle;

/**
 * ComboChart element.
 *
 * @since 0.12.0
 */
class ComboChart extends AbstractElement
{
    /**
     * Is part of collection.
     *
     * @var bool
     */
    protected $collectionRelation = true;

    /**
     * Types.
     *
     * @var array
     */
    private $types = [ 'pie' ];

    /**
     * Series.
     *
     * @var array
     */
    private $series = [];

    /**
     * Chart style.
     *
     * @var \PhpOffice\PhpWord\Style\Chart
     */
    private $style;

    /**
     * Create new instance.
     *
     * @param array $types
     * @param array $style
     */
    public function __construct($types, $style = null)
    {
        $this->setTypes($types);
        $this->style = $this->setNewStyle(new ChartStyle(), $style, true);
    }

    /**
     * Get types.
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Set types.
     *
     * @param array $values
     */
    public function setTypes($values): void
    {
        $enum = ['pie', 'doughnut', 'line', 'bar', 'stacked_bar', 'percent_stacked_bar', 'column', 'stacked_column', 'percent_stacked_column', 'area', 'radar', 'scatter'];
        $arr = [];
        foreach ($values as $value) {
            $arr[] = $this->setEnumVal($value, $enum, 'pie');
        }
        $this->types = $arr;
    }

    /**
     * Add series.
     *
     * @param int $idx (must correspond with types)
     * @param array $categories
     * @param array(array) $values
     * @param null|mixed $name
     */
    public function addSeries($idx, $categories, $values, $name = null): void
    {
        $this->series[$idx][] = [
            'categories' => $categories,
            'values' => $values,
            'name' => $name,
        ];
    }

    /**
     * Get series.
     *
     * @return array(array)
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Get chart style.
     *
     * @return \PhpOffice\PhpWord\Style\Chart
     */
    public function getStyle()
    {
        return $this->style;
    }
}
