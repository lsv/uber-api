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
use Lsv\UberApi\Entity\Promotion;
use Psr\Http\Message\ResponseInterface;

/**
 * The Promotions endpoint returns information about the promotion that will be available to a new user based on their activity's location.
 * These promotions do not apply for existing users.
 * Note: Please do not mention the promotion in your app unless you are part of our new user promotion whitelist.
 */
class Promotions extends AbstractRequest
{
    /**
     * Get promotions.
     *
     * @param Coordinates $start Coordinates of start location.
     * @param Coordinates $end   Coordinates of end location.
     *
     * @return Promotion
     */
    public function query(Coordinates $start, Coordinates $end)
    {
        return $this->doQuery([
            'start_latitude'  => $start->getLatitude(),
            'start_longitude' => $start->getLongitude(),
            'end_latitude'    => $end->getLatitude(),
            'end_longitude'   => $end->getLongitude(),
        ]);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return Promotion
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return Promotion::createFromArray($results);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'promotions';
    }
}
