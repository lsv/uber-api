<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity;

class City
{
    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @param float  $latitude
     * @param float  $longitude
     * @param string $displayName
     */
    public function __construct($latitude = null, $longitude = null, $displayName = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->displayName = $displayName;
    }

    /**
     * Gets the Latitude.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the Latitude.
     *
     * @param float $latitude
     *
     * @return City
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Gets the Longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the Longitude.
     *
     * @param float $longitude
     *
     * @return City
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Gets the DisplayName.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Sets the DisplayName.
     *
     * @param string $displayName
     *
     * @return City
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        $obj = new self();
        foreach ($results as $key => $value) {
            $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            $setter = 'set'.$key;
            $obj->{$setter}($value);
        }

        return $obj;
    }
}
