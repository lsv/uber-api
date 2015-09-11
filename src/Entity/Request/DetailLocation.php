<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity\Request;

use Lsv\UberApi\Entity\EntityInterface;
use Lsv\UberApi\Util\EntityUtil;

class DetailLocation implements EntityInterface
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
     * @var int
     */
    protected $bearing;

    /**
     * @param float $latitude
     * @param float $longitude
     * @param int   $bearing
     */
    public function __construct($latitude = null, $longitude = null, $bearing = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->bearing = $bearing;
    }

    /**
     * Gets the Latitude.
     *
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the Latitude.
     *
     * @param float|null $latitude
     *
     * @return DetailLocation
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Gets the Longitude.
     *
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the Longitude.
     *
     * @param float|null $longitude
     *
     * @return DetailLocation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Gets the Bearing.
     *
     * @return int|null
     */
    public function getBearing()
    {
        return $this->bearing;
    }

    /**
     * Sets the Bearing.
     *
     * @param int|null $bearing
     *
     * @return DetailLocation
     */
    public function setBearing($bearing)
    {
        $this->bearing = $bearing;

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
