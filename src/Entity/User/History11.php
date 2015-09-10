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

use SebastianBergmann\PHPLOC\Log\CSV\History;

class History11 extends History
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @param string $uuid
     * @param int    $requestTime
     * @param string $productId
     * @param string $status
     * @param float  $distance
     * @param int    $startTime
     * @param int    $endTime
     */
    public function __construct($uuid = null, $requestTime = null, $productId = null, $status = null, $distance = null, $startTime = null, $endTime = null)
    {
        $this->uuid = $uuid;
        $this->requestTime = $requestTime;
        $this->productId = $productId;
        $this->status = $status;
        $this->distance = $distance;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
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

}
