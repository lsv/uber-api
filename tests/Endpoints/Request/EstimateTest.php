<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Endpoints\Request;

use Lsv\UberApi\Endpoints\Request\Estimate;
use Lsv\UberApi\Entity\ProductType;
use Lsv\UberApiTest\AbstractTestCase;

class EstimateTest extends AbstractTestCase
{
    /**
     * @return Estimate
     */
    private function getRequest()
    {
        return new Estimate($this->getFileResultsHandler('estimate.json', true), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query(123, $this->getCoordinates());
        $req = $request->getRequest();

        self::assertEquals('POST', $req->getMethod());
        self::assertEquals('/v1/requests/estimate', $req->getUri()->getPath());
    }

    public function test_product_query()
    {
        $coordinate = $this->getCoordinates();
        $type = new ProductType(123);
        $type->setQueryParameters(['start_latitude' => $coordinate->getLatitude(), 'start_longitude' => $coordinate->getLongitude()]);

        $request = $this->getRequest();
        $result = $request->queryByProduct($type);

        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Estimate', $result);
        self::assertEquals($coordinate->getLatitude(), $result->getQueryParameters()['start_latitude']);
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler(null, true);

        $results = (new Estimate($client, true))->query(123, $this->getCoordinates(), $this->getCoordinates());
        self::assertNull($results);
        $results = (new Estimate($client, true))->query(123, $this->getCoordinates(), $this->getCoordinates());
        self::assertNull($results);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Estimate', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        self::assertEquals(2, $detail->getPickupEstimate());
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\EstimatePrice', $detail->getPrice());
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\EstimateTrip', $detail->getTrip());
    }

    /**
     * @depends test_type_getter
     */
    public function test_price_getter()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $detail = $result->getPrice();

        self::assertEquals('https://api.uber.com/v1/surge-confirmations/7d604f5e', $detail->getSurgeConfirmationHref());
        self::assertEquals(6, $detail->getHighEstimate());
        self::assertEquals('7d604f5e', $detail->getSurgeConfirmationId());
        self::assertEquals(5, $detail->getMinimum());
        self::assertEquals(5, $detail->getLowEstimate());
        self::assertEquals(1.2, $detail->getSurgeMultiplier());
        self::assertEquals('$5-6', $detail->getDisplay());
        self::assertEquals('USD', $detail->getCurrencyCode());
    }

    /**
     * @depends test_type_getter
     */
    public function test_trip_getter()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $detail = $result->getTrip();

        self::assertEquals('mile', $detail->getDistanceUnit());
        self::assertEquals(9, $detail->getDurationEstimate());
        self::assertEquals(2.1, $detail->getDistanceEstimate());
    }
}
