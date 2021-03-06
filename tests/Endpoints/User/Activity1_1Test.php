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

use Lsv\UberApi\Endpoints\User\Activity11;
use Lsv\UberApiTest\AbstractTestCase;

class Activity1_1Test extends AbstractTestCase
{
    private function getRequest()
    {
        return new Activity11($this->getFileResultsHandler('user_activity1_1.json', true), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query();
        $req = $request->getRequest();

        self::assertEquals('GET', $req->getMethod());
        self::assertEquals('/v1.1/history', $req->getUri()->getPath());
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('history', true);

        $results = (new Activity11($client, true))->query();
        self::assertCount(0, $results);
        $results = (new Activity11($client, true))->query();
        self::assertCount(0, $results);
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query();
        self::assertCount(2, $results);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $results = $this->getRequest()->query();
        $detail = $results[0];

        self::assertEquals('7354db54-cc9b-4961-81f2-0094b8e2d215', $detail->getUuid());
        self::assertEquals(new \DateTime('@1401884467'), $detail->getRequestTime());
        self::assertEquals('edf5e5eb-6ae6-44af-bec6-5bdcf1e3ed2c', $detail->getProductId());
        self::assertEquals('completed', $detail->getStatus());
        self::assertEquals(0.0279562, $detail->getDistance());
        self::assertEquals(new \DateTime('@1401884646'), $detail->getStartTime());
        self::assertEquals(new \DateTime('@1401884732'), $detail->getEndTime());
    }
}
