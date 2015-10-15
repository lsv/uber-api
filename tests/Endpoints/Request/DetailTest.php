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

use Lsv\UberApi\Endpoints\Request\Detail;
use Lsv\UberApiTest\AbstractTestCase;

class DetailTest extends AbstractTestCase
{
    private function getRequest()
    {
        return new Detail($this->getFileResultsHandler('request_detail.json', true), true);
    }

    public function test_method_url()
    {
        $key = 789654123;
        $request = $this->getRequest();
        $result = $request->query($key);
        $req = $request->getRequest();

        self::assertEquals('GET', $req->getMethod());
        self::assertEquals('/v1/requests/'.$key, $req->getUri()->getPath());
        self::assertEquals(789654123, $result->getPathParameters()['request_id']);
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler(null, true);

        $results = (new Detail($client, true))->query(123);
        self::assertEquals(0, $results);
        $results = (new Detail($client, true))->query(123);
        self::assertEquals(0, $results);
    }

    public function test_result_by_detail()
    {
        $detail = new \Lsv\UberApi\Entity\Request\Detail(123);
        $result = $this->getRequest()->queryByDetail($detail);
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Detail', $result);

        $detail = new \Lsv\UberApi\Entity\Request\Detail(123);
        $result = $this->getRequest()->query($detail);
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Detail', $result);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123);
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Detail', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123);
        self::assertEquals('b2205127-a334-4df4-b1ba-fc9f28f56c96', $detail->getRequestId(), 'getRequestId');
        self::assertEquals('accepted', $detail->getStatus(), 'getStatus');
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\DetailVehicle', $detail->getVehicle(), 'getVehicle');
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\DetailDriver', $detail->getDriver(), 'getDriver');
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\DetailLocation', $detail->getLocation(), 'getLocation');
        self::assertEquals(4, $detail->getEta(), 'Eta');
        self::assertEquals(1.0, $detail->getSurgeMultiplier(), 'getSurgeMultiplier');
    }

    /**
     * @depends test_type_getter
     */
    public function test_vehicle_getter()
    {
        $result = $this->getRequest()->query(123);
        $detail = $result->getVehicle();
        self::assertEquals('I<3Uber', $detail->getLicensePlate());
        self::assertEquals('Bugatti', $detail->getMake());
        self::assertEquals('Veyron', $detail->getModel());
        self::assertEquals('https://d1w2poirtb3as9.cloudfront.net/car.jpeg', $detail->getPictureUrl());
    }

    /**
     * @depends test_type_getter
     */
    public function test_driver_getter()
    {
        $result = $this->getRequest()->query(123);
        $detail = $result->getDriver();
        self::assertEquals('Bob', $detail->getName());
        self::assertEquals('(555)555-5555', $detail->getPhoneNumber());
        self::assertEquals('https://d1w2poirtb3as9.cloudfront.net/img.jpeg', $detail->getPictureUrl());
        self::assertEquals(5, $detail->getRating());
    }

    /**
     * @depends test_type_getter
     */
    public function test_location_getter()
    {
        $result = $this->getRequest()->query(123);
        $detail = $result->getLocation();
        self::assertEquals(33, $detail->getBearing());
        self::assertEquals(37.776033, $detail->getLatitude());
        self::assertEquals(-122.418143, $detail->getLongitude());
    }
}
