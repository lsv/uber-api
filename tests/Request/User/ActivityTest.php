<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Request\User;

use Lsv\UberApi\Request\User\Activity;
use Lsv\UberApiTest\AbstractTestCase;

class ActivityTest extends AbstractTestCase
{
    private function getRequest()
    {
        return new Activity($this->getFileResultsHandler('user_activity1_2.json', true), true);
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('history', true);

        $results = (new Activity($client, true))->query();
        $this->assertEquals(0, count($results));
        $results = (new Activity($client, true))->query();
        $this->assertEquals(0, count($results));
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query();
        $this->assertEquals(3, count($results));
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $results = $this->getRequest()->query();
        $detail = $results[0];

        $this->assertEquals('completed', $detail->getStatus());
        $this->assertEquals(1.64691465, $detail->getDistance());
        $this->assertEquals(new \DateTime('@1428876188'), $detail->getRequestTime());
        $this->assertEquals(new \DateTime('@1428876374'), $detail->getStartTime());
        $this->assertEquals(new \DateTime('@1428876927'), $detail->getEndTime());
        $this->assertEquals('37d57a99-2647-4114-9dd2-c43bccf4c30b', $detail->getRequestId());
        $this->assertEquals('a1111c8c-c720-46c3-8534-2fcdd730040d', $detail->getProductId());
    }

    /**
     * @depends test_type_getter
     */
    public function test_start_city()
    {
        $results = $this->getRequest()->query();
        $detail = $results[0]->getStartCity();

        $this->assertEquals(37.7749295, $detail->getLatitude());
        $this->assertEquals('San Francisco', $detail->getDisplayName());
        $this->assertEquals(-122.4194155, $detail->getLongitude());
    }
}
