<?php
namespace Lsv\UberApi\Request;

use Geocoder\Model\Coordinates;
use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Product\Type;
use Psr\Http\Message\ResponseInterface;

class ProductTypes extends AbstractRequest
{
    /**
     * @param Coordinates $coordinates
     * @return \Lsv\UberApi\Entity\Product\Type[]
     */
    public function query(Coordinates $coordinates)
    {
        return $this->doQuery([
            'latitude' => $coordinates->getLatitude(),
            'longitude' => $coordinates->getLongitude()
        ]);
    }

    /**
     * API Endpoint
     * @return string
     */
    protected function getEndPoint()
    {
        return 'products';
    }

    /**
     * Does this request require Oauth
     * @return bool
     */
    protected function requireOauth()
    {
        return false;
    }

    /**
     * Which HTTP method should be used to this endpoint
     * @return string
     */
    protected function httpMethod()
    {
        return 'GET';
    }

    /**
     * Parse the query response
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);
        return Type::createFromArray($results['products']);
    }

    /**
     * API version of the method
     * @return string
     */
    protected function getApiVersion()
    {
        return 'v1';
    }
}
