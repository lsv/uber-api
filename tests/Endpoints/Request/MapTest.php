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

use Lsv\UberApi\Endpoints\Request\Map;
use Lsv\UberApi\Entity\Request\Detail;
use Lsv\UberApiTest\AbstractTestCase;

class MapTest extends AbstractTestCase
{
    /**
     * @return Map
     */
    private function getRequest()
    {
        return new Map($this->getFileResultsHandler('map.json', true), true);
    }

    public function test_method_url()
    {
        $requestId = 123;
        $request = $this->getRequest();
        $request->query($requestId);
        $req = $request->getRequest();

        $this->assertEquals('GET', $req->getMethod());
        $this->assertEquals('/v1/requests/'.$requestId.'/map', $req->getUri()->getPath());
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler(null, true);

        $results = (new Map($client, true))->query(123);
        $this->assertNull($results);
        $results = (new Map($client, true))->query(123);
        $this->assertNull($results);
    }

    public function test_by_detail()
    {
        $detail = new Detail(123);
        $result = $this->getRequest()->queryByDetail($detail);
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Map', $result);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123);
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Map', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123);
        $this->assertEquals('b5512127-a134-4bf4-b1ba-fe9f48f56d9d', $detail->getRequestId());
        $this->assertEquals('https://trip.uber.com/abc123', $detail->getHref());
    }
}
