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

use Lsv\UberApi\Entity\AbstractEntity;
use Lsv\UberApi\Entity\EntityInterface;
use Lsv\UberApi\Util\EntityUtil;

/**
 * Adjustments made to the charges such as promotions, and fees.
 */
class ReceiptChargeAdjustment extends AbstractEntity implements EntityInterface
{
    use ChargeTrait;

    /**
     * Constructor.
     *
     * @param string $name   The name of the charge adjustment.
     * @param float  $amount The amount of the charge adjustment.
     * @param string $type   The type key for the charge adjustment.
     */
    public function __construct($name = null, $amount = null, $type = null)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->type = $type;
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
