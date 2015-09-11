<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Endpoints\Estimates;

use Geocoder\Model\Coordinates;
use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Estimate\Time as TimeEntity;
use Psr\Http\Message\ResponseInterface;

class Time extends AbstractRequest
{
    /**
     * @param Coordinates $start
     * @param null|string $customerUuid
     * @param null|string $productId
     *
     * @return \Lsv\UberApi\Entity\Estimate\Time[]
     */
    public function query(Coordinates $start, $customerUuid = null, $productId = null)
    {
        $params = [
            'start_latitude'  => $start->getLatitude(),
            'start_longitude' => $start->getLongitude(),
        ];

        if ($customerUuid) {
            $params['customer_uuid'] = $customerUuid;
        }

        if ($productId) {
            $params['product_id'] = $productId;
        }

        return $this->doQuery($params);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return TimeEntity[]
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return TimeEntity::createFromArray($results['times']);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'estimates/time';
    }
}
