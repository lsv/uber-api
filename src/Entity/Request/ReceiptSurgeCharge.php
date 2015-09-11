<?php
namespace Lsv\UberApi\Entity\Request;

use Lsv\UberApi\Util\EntityUtil;

class ReceiptSurgeCharge
{
    use ChargeTrait;

    /**
     * @param string $name
     * @param float $amount
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
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
