<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Endpoints\User;

use Lsv\UberApi\Endpoints\User\Activity;
use Lsv\UberApiTest\AbstractTestCase;

class ActivityTest extends AbstractTestCase
{
    private function getRequest()
    {
        return new Activity($this->getFileResultsHandler('user_activity1_2.json', true), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query();
        $req = $request->getRequest();

        self::assertEquals('GET', $req->getMethod());
        self::assertEquals('/v1.2/history', $req->getUri()->getPath());
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('history', true);

        $results = (new Activity($client, true))->query();
        self::assertCount(0, $results);
        $results = (new Activity($client, true))->query();
        self::assertCount(0, $results);
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query();
        self::assertCount(3, $results);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $results = $this->getRequest()->query();
        $detail = $results[0];

        self::assertEquals('completed', $detail->getStatus());
        self::assertEquals(1.64691465, $detail->getDistance());
        self::assertEquals(new \DateTime('@1428876188'), $detail->getRequestTime());
        self::assertEquals(new \DateTime('@1428876374'), $detail->getStartTime());
        self::assertEquals(new \DateTime('@1428876927'), $detail->getEndTime());
        self::assertEquals('37d57a99-2647-4114-9dd2-c43bccf4c30b', $detail->getRequestId());
        self::assertEquals('a1111c8c-c720-46c3-8534-2fcdd730040d', $detail->getProductId());
    }

    /**
     * @depends test_type_getter
     */
    public function test_start_city()
    {
        $results = $this->getRequest()->query();
        $detail = $results[0]->getStartCity();

        self::assertEquals(37.7749295, $detail->getLatitude());
        self::assertEquals('San Francisco', $detail->getDisplayName());
        self::assertEquals(-122.4194155, $detail->getLongitude());
    }
}
