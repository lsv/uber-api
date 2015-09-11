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
 * Class ProductType
 * @package Lsv\UberApi\Entity
 */
class ProductType implements EntityInterface
{
    /**
     * Unique identifier representing a specific product for a given latitude & longitude.
     * @var string
     */
    protected $productId;

    /**
     * Capacity of product. For example, 4 people.
     * @var int
     */
    protected $capacity;

    /**
     * Description of product.
     * @var string
     */
    protected $description;

    /**
     * Image URL representing the product.
     * @var string
     */
    protected $image;

    /**
     * The basic price details (not including any surge pricing adjustments). If null, the price is a metered fare such as a taxi service.
     * @var ProductTypePrice
     */
    protected $priceDetail;

    /**
     * Display name of product.
     * @var string
     */
    protected $displayName;

    /**
     * Constructor
     * @param string           $productId Unique identifier representing a specific product for a given latitude & longitude.
     * @param int              $capacity Capacity of product. For example, 4 people.
     * @param string           $description Description of product.
     * @param string           $image Image URL representing the product.
     * @param ProductTypePrice $priceDetail The basic price details (not including any surge pricing adjustments). If null, the price is a metered fare such as a taxi service.
     * @param string           $displayName Display name of product.
     */
    public function __construct($productId = null, $capacity = null, $description = null, $image = null, ProductTypePrice $priceDetail = null, $displayName = null)
    {
        $this->productId = $productId;
        $this->capacity = $capacity;
        $this->description = $description;
        $this->image = $image;
        $this->priceDetail = $priceDetail;
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
     * @return ProductType
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
     * @return ProductType
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
     * @return ProductType
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
     * @return ProductType
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets the PriceDetails.
     *
     * @return ProductTypePrice
     */
    public function getPriceDetail()
    {
        return $this->priceDetail;
    }

    /**
     * Sets the PriceDetails.
     *
     * @param ProductTypePrice $priceDetail
     *
     * @return ProductType
     */
    public function setPriceDetail($priceDetail)
    {
        $this->priceDetail = $priceDetail;

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
     * @return ProductType
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * {@inheritdoc}
     * @param array|null $results
     * @return array
     */
    public static function createFromArray(array $results = null)
    {
        return EntityUtil::multipleCreateFromArray(self::class, $results, [
            'PriceDetails' => ['setter' => 'setPriceDetail', 'class' => ProductTypePrice::class],
        ]);
    }
}
