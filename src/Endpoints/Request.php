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

/**
 * The Request endpoint allows a ride to be requested on behalf of an Uber user given their desired product, start, and end locations.
 */
class Request extends AbstractRequest
{
    /**
     * Make a request.
     *
     * @param string      $productId           The unique ID of the product being requested.
     * @param Coordinates $start               The beginning or "pickup" coordinate.
     * @param Coordinates $end                 The final or destination coordinate.
     * @param string      $surgeConfirmationId The unique identifier of the surge session for a user. Required when returned from a 409 Conflict response on previous POST attempt.
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

        return Detail::createFromArray($results, $queryParameters, $pathParameters);
    }
}
