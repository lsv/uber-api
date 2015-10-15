<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Endpoints\User;

use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\User\Profile as ProfileEntity;
use Psr\Http\Message\ResponseInterface;

/**
 * The User Profile endpoint returns information about the Uber user that has authorized with the application.
 */
class Profile extends AbstractRequest
{
    /**
     * Get profile data.
     *
     * @return ProfileEntity
     */
    public function query()
    {
        return $this->doQuery([]);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     * @param array             $queryParameters
     * @param array             $pathParameters
     *
     * @return ProfileEntity
     */
    protected function parseResponse(ResponseInterface $response, $queryParameters, $pathParameters)
    {
        $results = json_decode($response->getBody(), true);

        return ProfileEntity::createFromArray($results, $queryParameters, $pathParameters);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'me';
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    protected function requireOauth()
    {
        return true;
    }
}
