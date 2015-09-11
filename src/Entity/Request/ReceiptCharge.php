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

class ReceiptCharge implements EntityInterface
{
    use ChargeTrait;

    /**
     * @param string $name
     * @param float  $amount
     * @param string $type
     */
    public function __construct($name = null, $amount = null, $type = null)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->type = $type;
    }

    public static function createFromArray(array $results = [])
    {
        return EntityUtil::multipleCreateFromArray(self::class, $results);
    }
}
