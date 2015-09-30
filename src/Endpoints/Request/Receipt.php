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

use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Request\Detail as DetailEntity;
use Lsv\UberApi\Entity\Request\Receipt as ReceiptEntity;
use Psr\Http\Message\ResponseInterface;

/**
 * Get the receipt information of the completed request.
 */
class Receipt extends AbstractRequest
{
    /**
     * Get the receipt.
     *
     * @param string $requestId Unique identifier representing a Request.
     *
     * @return ReceiptEntity
     */
    public function query($requestId)
    {
        return $this->doQuery([], [
            'request_id' => $requestId,
        ]);
    }

    /**
     * Get receipt by detail.
     *
     * @param DetailEntity $detail
     *
     * @return ReceiptEntity
     */
    public function queryByDetail(DetailEntity $detail)
    {
        return $this->query($detail->getRequestId());
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'requests/{request_id}/receipt';
    }

    /**
     * {@inheritdoc}
     */
    protected function requireOauth()
    {
        return true;
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     * @param array             $queryParameters
     * @param array             $pathParameters
     *
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response, $queryParameters, $pathParameters)
    {
        $results = json_decode($response->getBody(), true);

        return ReceiptEntity::createFromArray($results, $queryParameters, $pathParameters);
    }
}
