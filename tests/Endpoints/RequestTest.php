<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Endpoints;

use Lsv\UberApi\Endpoints\Request;
use Lsv\UberApi\Entity\ProductType;
use Lsv\UberApi\Entity\Request\Estimate;
use Lsv\UberApi\Entity\Request\EstimatePrice;
use Lsv\UberApiTest\AbstractTestCase;

class RequestTest extends AbstractTestCase
{
    private function getRequest()
    {
        return new Request($this->getFileResultsHandler('request.json', true), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query(123, $this->getCoordinates(), $this->getCoordinates());
        $req = $request->getRequest();

        self::assertEquals('POST', $req->getMethod());
        self::assertEquals('/v1/requests', $req->getUri()->getPath());
    }

    public function test_query_by_product()
    {
        $coordinates = $this->getCoordinates();
        $productType = new ProductType(123);
        $productType->setQueryParameters(['latitude' => $coordinates->getLatitude(), 'longitude' => $coordinates->getLongitude()]);
        $detail = $this->getRequest()->queryByProduct($productType, $this->getCoordinates());
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Detail', $detail);
    }

    public function test_query_by_estimate()
    {
        $coordinates = $this->getCoordinates();
        $price = new EstimatePrice(null, null, 123);
        $estimate = new Estimate($price);
        $estimate->setQueryParameters([
            'product_id' => 123,
            'start_latitude' => $coordinates->getLatitude(),
            'start_longitude' => $coordinates->getLongitude(),
            'end_latitude' => $coordinates->getLatitude(),
            'end_longitude' => $coordinates->getLongitude()
        ]);
        $detail = $this->getRequest()->queryByEstimate($estimate);
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Detail', $detail);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Detail', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates(), 123);
        self::assertEquals('852b8fdd-4369-4659-9628-e122662ad257', $detail->getRequestId(), 'getRequestId');
        self::assertEquals('processing', $detail->getStatus(), 'getStatus');
        self::assertNull($detail->getVehicle(), 'getVehicle');
        self::assertNull($detail->getDriver(), 'getDriver');
        self::assertNull($detail->getLocation(), 'getLocation');
        self::assertEquals(5, $detail->getEta(), 'Eta');
        self::assertNull($detail->getSurgeMultiplier(), 'getSurgeMultiplier');
    }
}
