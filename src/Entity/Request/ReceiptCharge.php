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
 * Receipt charge object
 */
class ReceiptCharge implements EntityInterface
{
    use ChargeTrait;

    /**
     * Constructor
     *
     * @param string $name The name of the charge.
     * @param float  $amount The amount of the charge.
     * @param string $type The type key of the charge
     */
    public function __construct($name = null, $amount = null, $type = null)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     *
     * @param array $results
     * @return array
     */
    public static function createFromArray(array $results = [])
    {
        return EntityUtil::multipleCreateFromArray(self::class, $results);
    }
}
