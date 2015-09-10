<?php
namespace Lsv\UberApi\Endpoints;

use Geocoder\Model\Coordinates;
use Lsv\UberApi\AbstractRequest;
use Psr\Http\Message\ResponseInterface;

class Request extends AbstractRequest
{

    /**
     * @param $productId
     * @param Coordinates $start
     * @param Coordinates $end
     * @param null $surgeConfirmationId
     * @return RequestResponse
     */
    public function query($productId, Coordinates $start, Coordinates $end, $surgeConfirmationId = null)
    {
        return $this->doQuery([
            'product_id' => $productId,
            'start_latitude' => $start->getLatitude(),
            'start_longitude' => $start->getLongitude(),
            'end_latitude' => $end->getLatitude(),
            'end_longitude' => $end->getLongitude(),
            'surge_confirmation_id' => $surgeConfirmationId
        ]);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return RequestResponse
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return RequestResponse::createFromArray($results);
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
     * API version of the method.
     *
     * @return string
     */
    protected function getApiVersion()
    {
        return 'v1';
    }
}
