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

use Lsv\UberApi\Util\EntityUtil;

/**
 * City object
 */
class City implements EntityInterface
{
    /**
     * Latitude of the center of the city.
     *
     * @var float
     */
    protected $latitude;

    /**
     * Longitude of the center of the city.
     *
     * @var float
     */
    protected $longitude;

    /**
     * The name of the city
     *
     * @var string
     */
    protected $displayName;

    /**
     * Constructor
     *
     * @param float  $latitude Latitude of the center of the city.
     * @param float  $longitude Longitude of the center of the city.
     * @param string $displayName The name of the city
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

    /**
     * {@inheritdoc}
     *
     * @param array|null $results
     * @return null|object
     */
    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
