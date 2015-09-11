<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Endpoints\Request;

use Geocoder\Model\Coordinates;
use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Request\Estimate as EntityEstimate;
use Psr\Http\Message\ResponseInterface;

class Estimate extends AbstractRequest
{
    /**
     * @param $productId
     * @param Coordinates      $start
     * @param Coordinates|null $end
     *
     * @return EntityEstimate|[]
     */
    public function query($productId, Coordinates $start, Coordinates $end = null)
    {
        $params = [
            'product_id'      => $productId,
            'start_latitude'  => $start->getLatitude(),
            'start_longitude' => $start->getLongitude(),
        ];

        if ($end) {
            $params['end_latitude'] = $end->getLatitude();
            $params['end_longitude'] = $end->getLongitude();
        }

        return $this->doQuery($params);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return EntityEstimate|[]
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return EntityEstimate::createFromArray($results);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'requests/estimate';
    }

    /**
     * Does this request require Oauth.
     *
     * @return bool
     */
    protected function requireOauth()
    {
        return true;
    }

    /**
     * Which HTTP method should be used to this endpoint.
     *
     * @return string
     */
    protected function httpMethod()
    {
        return 'POST';
    }
}
