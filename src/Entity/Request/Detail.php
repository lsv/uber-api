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

use Lsv\UberApi\Util\EntityUtil;

class Detail
{
    /**
     * @var string
     */
    protected $requestId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var DetailVehicle
     */
    protected $vehicle;

    /**
     * @var DetailDriver
     */
    protected $driver;

    /**
     * @var DetailLocation
     */
    protected $location;

    /**
     * @var int
     */
    protected $eta;

    /**
     * @var float
     */
    protected $surgeMultiplier;

    /**
     * @param string              $requestId
     * @param string              $status
     * @param DetailVehicle|null  $vehicle
     * @param DetailDriver|null   $driver
     * @param DetailLocation|null $location
     * @param int                 $eta
     * @param float               $surgeMultiplier
     */
    public function __construct($requestId = null, $status = null, DetailVehicle $vehicle = null, DetailDriver $driver = null, DetailLocation $location = null, $eta = null, $surgeMultiplier = null)
    {
        $this->requestId = $requestId;
        $this->status = $status;
        $this->vehicle = $vehicle;
        $this->driver = $driver;
        $this->location = $location;
        $this->eta = $eta;
        $this->surgeMultiplier = $surgeMultiplier;
    }

    /**
     * Gets the RequestId.
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Sets the RequestId.
     *
     * @param string $requestId
     *
     * @return Detail
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * Gets the Status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the Status.
     *
     * @param string $status
     *
     * @return Detail
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the Vehicle.
     *
     * @return DetailVehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Sets the Vehicle.
     *
     * @param DetailVehicle $vehicle
     *
     * @return Detail
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Gets the Driver.
     *
     * @return DetailDriver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Sets the Driver.
     *
     * @param DetailDriver $driver
     *
     * @return Detail
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Gets the Location.
     *
     * @return DetailLocation
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the Location.
     *
     * @param DetailLocation $location
     *
     * @return Detail
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Gets the Eta.
     *
     * @return int
     */
    public function getEta()
    {
        return $this->eta;
    }

    /**
     * Sets the Eta.
     *
     * @param int $eta
     *
     * @return Detail
     */
    public function setEta($eta)
    {
        $this->eta = $eta;

        return $this;
    }

    /**
     * Gets the SurgeMultiplier.
     *
     * @return float
     */
    public function getSurgeMultiplier()
    {
        return $this->surgeMultiplier;
    }

    /**
     * Sets the SurgeMultiplier.
     *
     * @param float $surgeMultiplier
     *
     * @return Detail
     */
    public function setSurgeMultiplier($surgeMultiplier)
    {
        $this->surgeMultiplier = $surgeMultiplier;

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results, [
            'Driver'   => ['setter' => 'setDriver', 'class' => DetailDriver::class],
            'Location' => ['setter' => 'setLocation', 'class' => DetailLocation::class],
            'Vehicle'  => ['setter' => 'setVehicle', 'class' => DetailVehicle::class],
        ]);
    }
}
