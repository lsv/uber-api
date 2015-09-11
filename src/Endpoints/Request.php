<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Endpoints;

use Geocoder\Model\Coordinates;
use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Request\Detail;
use Psr\Http\Message\ResponseInterface;

class Request extends AbstractRequest
{
    /**
     * @param $productId
     * @param Coordinates $start
     * @param Coordinates $end
     * @param null        $surgeConfirmationId
     *
     * @return Detail
     */
    public function query($productId, Coordinates $start, Coordinates $end, $surgeConfirmationId = null)
    {
        $params = [
            'product_id'            => $productId,
            'start_latitude'        => $start->getLatitude(),
            'start_longitude'       => $start->getLongitude(),
            'end_latitude'          => $end->getLatitude(),
            'end_longitude'         => $end->getLongitude(),
        ];

        if ($surgeConfirmationId) {
            $params['surge_confirmation_id'] = $surgeConfirmationId;
        }
        return $this->doQuery($params);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return Detail
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return Detail::createFromArray($results);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'requests';
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
