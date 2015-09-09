<?php
namespace Lsv\UberApiTest\Request\Estimates;

use Lsv\UberApi\Request\Estimates\Time;
use Lsv\UberApiTest\AbstractTestCase;

class TimeTest extends AbstractTestCase
{

    /**
     * @return Time
     */
    private function getRequest()
    {
        return new Time($this->getFileResultsHandler('estimates_time.json'), 123, true);
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('times');

        $results = (new Time($client, 123, true))->query($this->getCoordinates());
        $this->assertEquals(0, count($results));
        $results = (new Time($client, 123, true))->query($this->getCoordinates());
        $this->assertEquals(0, count($results));
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query($this->getCoordinates());
        $this->assertEquals(4, count($results));
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
