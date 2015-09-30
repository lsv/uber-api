<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity\Estimate;

use Lsv\UberApi\Entity\AbstractEntity;
use Lsv\UberApi\Entity\EntityInterface;
use Lsv\UberApi\Util\EntityUtil;

/**
 * Estimated time object.
 */
class Time extends AbstractEntity implements EntityInterface
{
    /**
     * Unique identifier representing a specific product for a given latitude & longitude.
     *
     * @var string
     */
    protected $productId;

    /**
     * Display name of product.
     *
     * @var string
     */
    protected $displayName;

    /**
     * Localized display name of product.
     *
     * @var string
     */
    protected $localizedDisplayName;

    /**
     * ETA for the product (in seconds).
     *
     * @var int
     */
    protected $estimate;

    /**
     * Constructor.
     *
     * @param string $productId            Unique identifier representing a specific product
     * @param string $localizedDisplayName Display name of product.
     * @param string $displayName          Display name of product.
     * @param int    $estimate             ETA for the product (in seconds)
     */
    public function __construct($productId = null, $localizedDisplayName = null, $displayName = null, $estimate = null)
    {
        $this->productId = $productId;
        $this->displayName = $displayName;
        $this->estimate = $estimate;
        $this->localizedDisplayName = $localizedDisplayName;
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
     * @return Time
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Gets the LocalizedDisplayName.
     *
     * @return string
     */
    public function getLocalizedDisplayName()
    {
        return $this->localizedDisplayName;
    }

    /**
     * Sets the LocalizedDisplayName.
     *
     * @param string $localizedDisplayName
     *
     * @return Time
     */
    public function setLocalizedDisplayName($localizedDisplayName)
    {
        $this->localizedDisplayName = $localizedDisplayName;

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
     * @return Time
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Gets the Estimate.
     *
     * @return int
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Sets the Estimate.
     *
     * @param int $estimate
     *
     * @return Time
     */
    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;

        return $this;
    }

    /**
     * Create entity from array.
     *
     * @param array|null $results
     * @param array      $queryParameters
     * @param array      $pathParameters
     *
     * @return array|null|object
     */
    public static function createFromArray(array $results = null, array $queryParameters = null, array $pathParameters = null)
    {
        return EntityUtil::multipleCreateFromArray(self::class, $queryParameters, $pathParameters, $results);
    }
}
