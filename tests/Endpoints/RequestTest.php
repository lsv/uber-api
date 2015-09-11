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

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query(123, $this->getCoordinates(), $this->getCoordinates());
        $req = $request->getRequest();

        $this->assertEquals('POST', $req->getMethod());
        $this->assertEquals('/v1/requests', $req->getUri()->getPath());
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Detail', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates(), 123);
        $this->assertEquals('852b8fdd-4369-4659-9628-e122662ad257', $detail->getRequestId(), 'getRequestId');
        $this->assertEquals('processing', $detail->getStatus(), 'getStatus');
        $this->assertNull($detail->getVehicle(), 'getVehicle');
        $this->assertNull($detail->getDriver(), 'getDriver');
        $this->assertNull($detail->getLocation(), 'getLocation');
        $this->assertEquals(5, $detail->getEta(), 'Eta');
        $this->assertNull($detail->getSurgeMultiplier(), 'getSurgeMultiplier');
    }


}
