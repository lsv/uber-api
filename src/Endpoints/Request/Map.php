<?php
namespace Lsv\UberApi\Endpoints\Request;

use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Request\Map as MapEntity;
use Psr\Http\Message\ResponseInterface;

class Map extends AbstractRequest
{
    /**
     * @param string $requestId
     * @return MapEntity
     */
    public function query($requestId)
    {
        return $this->doQuery([], [
            'request_id' => $requestId
        ]);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return MapEntity
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return MapEntity::createFromArray($results);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'requests/{request_id}/map';
    }

    /**
     * {@inheritdoc}
     */
    protected function requireOauth()
    {
        return true;
    }
}