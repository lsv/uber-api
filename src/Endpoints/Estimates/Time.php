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

/**
 * The Time Estimates endpoint returns ETAs for all products offered at a given location,
 * with the responses expressed as integers in seconds.
 *
 * We recommend that this endpoint be called every minute to provide the most accurate,up-to-date ETAs.
 */
class Time extends AbstractRequest
{
    /**
     * Get time estimaties.
     *
     * @param Coordinates $start
     * @param null|string $customerUuid
     * @param null|string $productId
     *
     * @return TimeEntity[]
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
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'estimates/time';
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     * @param array $queryParameters
     * @param array $pathParameters
     *
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response, $queryParameters, $pathParameters)
    {
        $results = json_decode($response->getBody(), true);

        return TimeEntity::createFromArray($results['times'], $queryParameters, $pathParameters);
    }
}
