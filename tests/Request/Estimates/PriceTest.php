<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Request\Estimates;

use Lsv\UberApi\Request\Estimates\Price;
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

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('prices');

        $results = (new Price($client, true))->query($this->getCoordinates(), $this->getCoordinates());
        $this->assertEquals(0, count($results));
        $results = (new Price($client, true))->query($this->getCoordinates(), $this->getCoordinates());
        $this->assertEquals(0, count($results));
    }

    public function test_count_results()
    {
        $results = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates());
        $this->assertEquals(4, count($results));
    }

    /**
     * @depends test_count_results
     */
    public function test_price_getters()
    {
        $result = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates())[0];
        $this->assertEquals('08f17084-23fd-4103-aa3e-9b660223934b', $result->getProductId());
        $this->assertEquals('USD', $result->getCurrencyCode());
        $this->assertEquals('UberBLACK', $result->getDisplayName());
        $this->assertEquals('$23-29', $result->getEstimate());
        $this->assertEquals(23, $result->getLowEstimate());
        $this->assertEquals(29, $result->getHighEstimate());
        $this->assertEquals(1, $result->getSurgeMultiplier());
        $this->assertEquals(640, $result->getDuration());
        $this->assertEquals(5.34, $result->getDistance());
        $this->assertEquals('UberBlackLocal', $result->getLocalizedDisplayName());
        $this->assertEquals(20, $result->getMinimum());
    }

    /**
     * @depends test_count_results
     */
    public function test_taxi()
    {
        $result = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates())[2];
        $this->assertEquals('uberTAXI', $result->getDisplayName());
        $this->assertEquals('Metered', $result->getEstimate());
        $this->assertNull($result->getLowEstimate());
        $this->assertNull($result->getHighEstimate());
    }
}
