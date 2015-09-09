<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity\Product;

class Type
{
    /**
     * @var string
     */
    protected $productId;

    /**
     * @var int
     */
    protected $capacity;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var PriceDetail
     */
    protected $priceDetails;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @param string           $productId
     * @param int              $capacity
     * @param string           $description
     * @param string           $image
     * @param PriceDetail|null $priceDetails
     * @param string           $displayName
     */
    public function __construct($productId = null, $capacity = null, $description = null, $image = null, PriceDetail $priceDetails = null, $displayName = null)
    {
        $this->productId = $productId;
        $this->capacity = $capacity;
        $this->description = $description;
        $this->image = $image;
        $this->priceDetails = $priceDetails;
        $this->displayName = $displayName;
    }

    /**
     * Gets the ProductId.
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Sets the ProductId.
     *
     * @param string $productId
     *
     * @return Type
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Gets the Capacity.
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Sets the Capacity.
     *
     * @param int $capacity
     *
     * @return Type
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Gets the Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the Description.
     *
     * @param string $description
     *
     * @return Type
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the Image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the Image.
     *
     * @param string $image
     *
     * @return Type
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets the PriceDetails.
     *
     * @return PriceDetail
     */
    public function getPriceDetails()
    {
        return $this->priceDetails;
    }

    /**
     * Sets the PriceDetails.
     *
     * @param PriceDetail $priceDetails
     *
     * @return Type
     */
    public function setPriceDetails($priceDetails)
    {
        $this->priceDetails = $priceDetails;

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
     * @return Type
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        $objects = [];
        if (!$results) {
            return [];
        }
        foreach ($results as $result) {
            $obj = new self();
            foreach ($result as $key => $value) {
                $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
                switch ($key) {
                    case 'PriceDetails':
                        $obj->setPriceDetails(PriceDetail::createFromArray($value));
                        break;
                    default:
                        $setter = 'set'.$key;
                        $obj->{$setter}($value);
                        break;
                }
            }
            $objects[] = $obj;
        }

        return $objects;
    }
}
