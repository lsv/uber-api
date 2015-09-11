<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Endpoints\Estimates;

use Lsv\UberApi\Endpoints\Estimates\Time;
use Lsv\UberApiTest\AbstractTestCase;

class TimeTest extends AbstractTestCase
{
    /**
     * @return Time
     */
    private function getRequest()
    {
        return new Time($this->getFileResultsHandler('estimates_time.json'), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query($this->getCoordinates());
        $req = $request->getRequest();

        $this->assertEquals('GET', $req->getMethod() , 'method');
        $this->assertEquals('/v1/estimates/time', $req->getUri()->getPath(), 'uri');
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('times');

        $results = (new Time($client, true))->query($this->getCoordinates(), 123, 123);
        $this->assertCount(0, $results);
        $results = (new Time($client, true))->query($this->getCoordinates());
        $this->assertCount(0, $results);
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query($this->getCoordinates());
        $this->assertCount(4, $results);
    }

    /**
     * @depends test_count_results
     */
    public function test_time_getters()
    {
        $result = $this->getRequest()->query($this->getCoordinates())[0];
        $this->assertEquals('5f41547d-805d-4207-a297-51c571cf2a8c', $result->getProductId());
        $this->assertEquals('UberBLACK', $result->getDisplayName());
        $this->assertEquals('UberBLACKLocal', $result->getLocalizedDisplayName());
        $this->assertEquals(410, $result->getEstimate());
    }
}
