<?php
namespace Lsv\UberApiTest\Request\User;

use Lsv\UberApi\Request\User\Activity1_1;
use Lsv\UberApiTest\AbstractTestCase;

class Activity1_1Test extends AbstractTestCase
{

    private function getRequest()
    {
        return new Activity1_1($this->getFileResultsHandler('user_activity1_1.json', true), true);
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('history', true);

        $results = (new Activity1_1($client, true))->query();
        $this->assertEquals(0, count($results));
        $results = (new Activity1_1($client, true))->query();
        $this->assertEquals(0, count($results));
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query();
        $this->assertEquals(2, count($results));
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $results = $this->getRequest()->query();
        $detail = $results[0];

        $this->assertEquals('7354db54-cc9b-4961-81f2-0094b8e2d215', $detail->getUuid());
        $this->assertEquals(new \DateTime('@1401884467'), $detail->getRequestTime());
        $this->assertEquals('edf5e5eb-6ae6-44af-bec6-5bdcf1e3ed2c', $detail->getProductId());
        $this->assertEquals('completed', $detail->getStatus());
        $this->assertEquals(0.0279562, $detail->getDistance());
        $this->assertEquals(new \DateTime('@1401884646'), $detail->getStartTime());
        $this->assertEquals(new \DateTime('@1401884732'), $detail->getEndTime());
    }

}
