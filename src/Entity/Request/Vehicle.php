<?php
namespace Lsv\UberApi\Entity\Request;

class Vehicle
{
    /**
     * @var string
     */
    protected $make;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $licensePlate;

    /**
     * @var string
     */
    protected $pictureUrl;

    /**
     * @param string $make
     * @param string $model
     * @param string $licensePlate
     * @param string $pictureUrl
     */
    public function __construct($make = null, $model = null, $licensePlate = null, $pictureUrl = null)
    {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->pictureUrl = $pictureUrl;
    }

    /**
     * Gets the Make
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Sets the Make
     * @param string $make
     * @return Vehicle
     */
    public function setMake($make)
    {
        $this->make = $make;
        return $this;
    }

    /**
     * Gets the Model
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the Model
     * @param string $model
     * @return Vehicle
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Gets the LicensePlate
     * @return string
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Sets the LicensePlate
     * @param string $licensePlate
     * @return Vehicle
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;
        return $this;
    }

    /**
     * Gets the PictureUrl
     * @return string
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * Sets the PictureUrl
     * @param string $pictureUrl
     * @return Vehicle
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;
        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        if (!$results) {
            return [];
        }

        $obj = new self();
        foreach ($results as $key => $value) {
            $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            $setter = 'set'.$key;
            $obj->{$setter}($value);
        }

        return $obj;
    }

}
