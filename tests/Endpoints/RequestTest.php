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
use Lsv\UberApiTest\AbstractTestCase;

class RequestTest extends AbstractTestCase
{
    private function getRequest()
    {
        return new Request($this->getFileResultsHandler('request.json', true), true);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\RequestResponse', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $this->assertEquals('852b8fdd-4369-4659-9628-e122662ad257', $detail->getRequestId(), 'getRequestId');
        $this->assertEquals('processing', $detail->getStatus(), 'getStatus');
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Vehicle', $detail->getVehicle(), 'getVehicle');
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Driver', $detail->getDriver(), 'getDriver');
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Location', $detail->getLocation(), 'getLocation');
        $this->assertEquals(5, $detail->getEta(), 'Eta');
        $this->assertNull($detail->getSurgeMultiplier(), 'getSurgeMultiplier');
    }

    /**
     * @depends test_type_getter
     */
    public function test_vehicle_getter()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $detail = $result->getVehicle();
    }

    /**
     * @depends test_type_getter
     */
    public function test_driver_getter()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $detail = $result->getDriver();
    }

    /**
     * @depends test_type_getter
     */
    public function test_location_getter()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $detail = $result->getLocation();
    }
}
