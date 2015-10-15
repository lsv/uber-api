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

use Lsv\UberApi\Endpoints\Estimates\Price;
use Lsv\UberApiTest\AbstractTestCase;

class PriceTest extends AbstractTestCase
{
    /**
     * @return Price
     */
    private function getRequest()
    {
        return new Price($this->getFileResultsHandler('estimates_price.json'), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query($this->getCoordinates(), $this->getCoordinates());
        $req = $request->getRequest();

        self::assertEquals('GET', $req->getMethod());
        self::assertEquals('/v1/estimates/price', $req->getUri()->getPath());
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('prices');

        $results = (new Price($client, true))->query($this->getCoordinates(), $this->getCoordinates());
        self::assertCount(0, $results);
        $results = (new Price($client, true))->query($this->getCoordinates(), $this->getCoordinates());
        self::assertCount(0, $results);
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates());
        self::assertCount(4, $results);
    }

    /**
     * @depends test_count_results
     */
    public function test_price_getters()
    {
        $result = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates())[0];
        self::assertEquals('08f17084-23fd-4103-aa3e-9b660223934b', $result->getProductId());
        self::assertEquals('USD', $result->getCurrencyCode());
        self::assertEquals('UberBLACK', $result->getDisplayName());
        self::assertEquals('$23-29', $result->getEstimate());
        self::assertEquals(23, $result->getLowEstimate());
        self::assertEquals(29, $result->getHighEstimate());
        self::assertEquals(1, $result->getSurgeMultiplier());
        self::assertEquals(640, $result->getDuration());
        self::assertEquals(5.34, $result->getDistance());
        self::assertEquals('UberBlackLocal', $result->getLocalizedDisplayName());
        self::assertEquals(20, $result->getMinimum());
    }

    /**
     * @depends test_count_results
     */
    public function test_taxi()
    {
        $result = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates())[2];
        self::assertEquals('uberTAXI', $result->getDisplayName());
        self::assertEquals('Metered', $result->getEstimate());
        self::assertNull($result->getLowEstimate());
        self::assertNull($result->getHighEstimate());
    }
}
