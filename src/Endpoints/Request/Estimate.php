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
use Lsv\UberApi\Entity\ProductType;
use Lsv\UberApi\Entity\Request\Estimate as EntityEstimate;
use Psr\Http\Message\ResponseInterface;

/**
 * The Request Estimate endpoint allows a ride to be estimated given the desired product, start, and end locations.
 * If the end location is not provided, only the pickup ETA and details of surge pricing information are provided.
 * If the pickup ETA is null, there are no cars available, but an estimate may still be given to the user.
 *
 * You can use this endpoint to determine if surge pricing is in effect.
 * Do this before attempting to make a request so that you can preemptively have a user confirm surge by sending them to the surge_confirmation_href provided in the response.
 */
class Estimate extends AbstractRequest
{
    /**
     * Get estimate request.
     *
     * @param string           $productId The unique ID of the product being requested.
     * @param Coordinates      $start     The beginning or "pickup" coordinate.
     * @param Coordinates|null $end       The final or destination latitude. If not included, only the pickup ETA and details of surge pricing will be included.
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
     * Get estimate from producttype
     *
     * @param ProductType $product The queried product type
     * @param Coordinates|null $end The final or destination latitude. If not included, only the pickup ETA and details of surge pricing will be included.
     * @return EntityEstimate|[]
     */
    public function queryByProduct(ProductType $product, Coordinates $end = null)
    {
        return $this->query(
            $product->getProductId(),
            new Coordinates(
                $product->getQueryParameters()['start_latitude'],
                $product->getQueryParameters()['start_longitude']
            ),
            $end
        );
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

        return EntityEstimate::createFromArray($results, $queryParameters, $pathParameters);
    }
}
