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

class Driver
{
    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var float
     */
    protected $rating;

    /**
     * @var string
     */
    protected $pictureUrl;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $phoneNumber
     * @param float  $rating
     * @param string $pictureUrl
     * @param string $name
     */
    public function __construct($phoneNumber = null, $rating = null, $pictureUrl = null, $name = null)
    {
        $this->phoneNumber = $phoneNumber;
        $this->rating = $rating;
        $this->pictureUrl = $pictureUrl;
        $this->name = $name;
    }

    /**
     * Gets the PhoneNumber.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets the PhoneNumber.
     *
     * @param string $phoneNumber
     *
     * @return Driver
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Gets the Rating.
     *
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the Rating.
     *
     * @param float $rating
     *
     * @return Driver
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

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
     * @return Driver
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;

        return $this;
    }

    /**
     * Gets the Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the Name.
     *
     * @param string $name
     *
     * @return Driver
     */
    public function setName($name)
    {
        $this->name = $name;

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
