<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Endpoints\Estimates;

use Geocoder\Model\Coordinates;
use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Estimate\Price as PriceEntity;
use Psr\Http\Message\ResponseInterface;

/**
 * The Price Estimates endpoint returns an estimated price range for each product offered at a given location.
 * The price estimate is provided as a formatted string with the full price range and the localized currency symbol.
 *
 * The response also includes low and high estimates, and the ISO 4217 currency code for situations requiring currency conversion.
 * When surge is active for a particular product, its surge_multiplier will be greater than 1,
 * but the price estimate already factors in this multiplier.
 */
class Price extends AbstractRequest
{
    /**
     * Query price estimate.
     *
     * @param Coordinates $start Coordinates of start location.
     * @param Coordinates $end   Coordinates of end location.
     *
     * @return \Lsv\UberApi\Entity\Estimate\Price[]
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
     * @return PriceEntity[]
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return PriceEntity::createFromArray($results['prices']);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'estimates/price';
    }
}
