<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Request\Estimates;

use Geocoder\Model\Coordinates;
use GuzzleHttp\Message\ResponseInterface;
use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Estimate\Time as TimeEntity;

class Time extends AbstractRequest
{
    /**
     * @param Coordinates $start
     * @param null|string $customer_uuid
     * @param null|string $product_id
     *
     * @return \Lsv\UberApi\Entity\Estimate\Time[]
     */
    public function query(Coordinates $start, $customer_uuid = null, $product_id = null)
    {
        return $this->doQuery([
            'start_latitude'  => $start->getLatitude(),
            'start_longitude' => $start->getLongitude(),
            'customer_uuid'   => $customer_uuid,
            'product_id'      => $product_id,
        ]);
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

    /**
     * Does this request require Oauth.
     *
     * @return bool
     */
    protected function requireOauth()
    {
        return false;
    }

    /**
     * Which HTTP method should be used to this endpoint.
     *
     * @return string
     */
    protected function httpMethod()
    {
        return 'GET';
    }

    /**
     * API version of the method.
     *
     * @return string
     */
    protected function getApiVersion()
    {
        return 'v1';
    }
}
