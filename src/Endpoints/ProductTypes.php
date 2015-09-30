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
use Lsv\UberApi\Entity\ProductType;
use Psr\Http\Message\ResponseInterface;

/**
 * The Products endpoint returns information about the Uber products offered at a given location.
 * The response includes the display name and other details about each product, and lists the products in the proper display order.
 *
 * Some Products, such as experiments or promotions such as UberPOOL and UberFRESH, will not be returned by this endpoint.
 */
class ProductTypes extends AbstractRequest
{
    /**
     * Query product types.
     *
     * @param Coordinates $coordinates Coordinates of location
     *
     * @return \Lsv\UberApi\Entity\ProductType[]
     */
    public function query(Coordinates $coordinates)
    {
        return $this->doQuery([
            'latitude'  => $coordinates->getLatitude(),
            'longitude' => $coordinates->getLongitude(),
        ]);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'products';
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

        return ProductType::createFromArray($results['products'], $queryParameters, $pathParameters);
    }
}
