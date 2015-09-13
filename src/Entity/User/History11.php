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

use Lsv\UberApi\Util\EntityUtil;

/**
 * User history (version 1.1).
 */
class History11 extends History
{
    /**
     * Unique activity identifier.
     *
     * @var string
     */
    protected $uuid;

    /**
     * Constructor.
     *
     * @param string $uuid        Unique activity identifier.
     * @param int    $requestTime Unix timestamp of activity request time.
     * @param string $productId   Unique identifier representing a specific product
     * @param string $status      Status of the activity. Only returns completed for now.
     * @param float  $distance    Length of activity in miles.
     * @param int    $startTime   Unix timestamp of activity start time.
     * @param int    $endTime     Unix timestamp of activity end time.
     */
    public function __construct($uuid = null, $requestTime = null, $productId = null, $status = null, $distance = null, $startTime = null, $endTime = null)
    {
        $this->uuid = $uuid;
        parent::__construct(null, $requestTime, $productId, $status, $distance, $startTime, $endTime, null);
    }

    /**
     * Gets the Uuid.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Sets the Uuid.
     *
     * @param string $uuid
     *
     * @return History11
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param array|null $results
     *
     * @return array
     */
    public static function createFromArray(array $results = null)
    {
        return EntityUtil::multipleCreateFromArray(self::class, $results);
    }
}
