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
 * Driver details.
 */
class DetailDriver implements EntityInterface
{
    /**
     * The formatted phone number for contacting the driver.
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * The driver's star rating out of 5 stars.
     *
     * @var float
     */
    protected $rating;

    /**
     * The URL to the photo of the driver.
     *
     * @var string
     */
    protected $pictureUrl;

    /**
     * The first name of the driver.
     *
     * @var string
     */
    protected $name;

    /**
     * Constructor.
     *
     * @param string $phoneNumber The formatted phone number for contacting the driver.
     * @param float  $rating      The driver's star rating out of 5 stars.
     * @param string $pictureUrl  The URL to the photo of the driver.
     * @param string $name        The first name of the driver.
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
     * @return DetailDriver
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
     * @return DetailDriver
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
     * @return DetailDriver
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
     * @return DetailDriver
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param array|null $results
     *
     * @return null|object
     */
    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
