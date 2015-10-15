<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity\User;

use Lsv\UberApi\Entity\AbstractEntity;
use Lsv\UberApi\Entity\EntityInterface;
use Lsv\UberApi\Util\EntityUtil;

class Profile extends AbstractEntity implements EntityInterface
{
    /**
     * First name of the Uber user.
     *
     * @var string
     */
    private $firstName;

    /**
     * Last name of the Uber user.
     *
     * @var string
     */
    private $lastName;

    /**
     * Email address of the Uber user.
     *
     * @var string
     */
    private $email;

    /**
     * Image URL of the Uber user.
     *
     * @var string
     */
    private $picture;

    /**
     * Promo code of the Uber user.
     *
     * @var string
     */
    private $promoCode;

    /**
     * Unique identifier of the Uber user.
     *
     * @var string
     */
    private $uuid;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $picture
     * @param string $promoCode
     * @param string $uuid
     */
    public function __construct($firstName = null, $lastName = null, $email = null, $picture = null, $promoCode = null, $uuid = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->picture = $picture;
        $this->promoCode = $promoCode;
        $this->uuid = $uuid;
    }

    /**
     * Get FirstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set FirstName.
     *
     * @param string $firstName
     *
     * @return Profile
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get LastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set LastName.
     *
     * @param string $lastName
     *
     * @return Profile
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set Email.
     *
     * @param string $email
     *
     * @return Profile
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get Picture.
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set Picture.
     *
     * @param string $picture
     *
     * @return Profile
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get PromoCode.
     *
     * @return string
     */
    public function getPromoCode()
    {
        return $this->promoCode;
    }

    /**
     * Set PromoCode.
     *
     * @param string $promoCode
     *
     * @return Profile
     */
    public function setPromoCode($promoCode)
    {
        $this->promoCode = $promoCode;

        return $this;
    }

    /**
     * Get Uuid.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set Uuid.
     *
     * @param string $uuid
     *
     * @return Profile
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Create entity from array.
     *
     * @param array|null $results
     * @param array      $queryParameters
     * @param array      $pathParameters
     *
     * @return array|null|Profile
     */
    public static function createFromArray(array $results = null, array $queryParameters = null, array $pathParameters = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $queryParameters, $pathParameters, $results);
    }
}
