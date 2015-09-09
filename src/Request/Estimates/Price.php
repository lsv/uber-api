<?php
namespace Lsv\UberApi\Request\Estimates;

use Geocoder\Model\Coordinates;
use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Estimate\Price as PriceEntity;
use Psr\Http\Message\ResponseInterface;

class Price extends AbstractRequest
{
    /**
     * @param Coordinates $start
     * @param Coordinates $end
     * @return \Lsv\UberApi\Entity\Estimate\Price[]
     */
    public function query(Coordinates $start, Coordinates $end)
    {
        return $this->doQuery([
            'start_latitude' => $start->getLatitude(),
            'start_longitude' => $start->getLongitude(),
            'end_latitude' => $end->getLatitude(),
            'end_longitude' => $end->getLongitude()
        ]);
    }

    /**
     * Parse the query response
     * @param ResponseInterface $response
     * @return PriceEntity[]
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);
        return PriceEntity::createFromArray($results['prices']);
    }

    /**
     * API Endpoint
     * @return string
     */
    protected function getEndPoint()
    {
        return 'estimates/price';
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
     * API version of the method
     * @return string
     */
    protected function getApiVersion()
    {
        return 'v1';
    }
}
