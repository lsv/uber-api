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

/**
 * The object that contains vehicle details.
 */
class DetailVehicle implements EntityInterface
{
    /**
     * The vehicle make or brand.
     *
     * @var string
     */
    protected $make;

    /**
     * The vehicle model or type.
     *
     * @var string
     */
    protected $model;

    /**
     * The license plate number of the vehicle.
     *
     * @var string
     */
    protected $licensePlate;

    /**
     * The URL to a stock photo of the vehicle (may be null).
     *
     * @var string
     */
    protected $pictureUrl;

    /**
     * Constructor
     *
     * @param string $make The vehicle make or brand.
     * @param string $model The vehicle model or type.
     * @param string $licensePlate The license plate number of the vehicle.
     * @param string $pictureUrl The URL to a stock photo of the vehicle (may be null).
     */
    public function __construct($make = null, $model = null, $licensePlate = null, $pictureUrl = null)
    {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->pictureUrl = $pictureUrl;
    }

    /**
     * Gets the Make.
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Sets the Make.
     *
     * @param string $make
     *
     * @return DetailVehicle
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Gets the Model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the Model.
     *
     * @param string $model
     *
     * @return DetailVehicle
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Gets the LicensePlate.
     *
     * @return string
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Sets the LicensePlate.
     *
     * @param string $licensePlate
     *
     * @return DetailVehicle
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    /**
     * Gets the PictureUrl.
     *
     * @return string
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * Sets the PictureUrl.
     *
     * @param string $pictureUrl
     *
     * @return DetailVehicle
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;

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
