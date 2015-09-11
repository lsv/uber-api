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

use Lsv\UberApi\Endpoints\Request\Receipt;
use Lsv\UberApiTest\AbstractTestCase;

class ReceiptTest extends AbstractTestCase
{
    /**
     * @return Receipt
     */
    private function getRequest()
    {
        return new Receipt($this->getFileResultsHandler('receipt.json', true), true);
    }

    public function test_method_url()
    {
        $requestId = 123;
        $request = $this->getRequest();
        $request->query($requestId);
        $req = $request->getRequest();

        $this->assertEquals('GET', $req->getMethod());
        $this->assertEquals('/v1/requests/'.$requestId.'/receipt', $req->getUri()->getPath());
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler(null, true);

        $results = (new Receipt($client, true))->query(123);
        $this->assertNull($results);
        $results = (new Receipt($client, true))->query(123);
        $this->assertNull($results);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123);
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Receipt', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123);
        $this->assertEquals('b5512127-a134-4bf4-b1ba-fe9f48f56d9d', $detail->getRequestId(), 'getRequestId');
        $this->assertCount(3, $detail->getCharges(), 'getCharges');
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\ReceiptSurgeCharge', $detail->getSurgeCharge(), 'getSurgeCharges');
        $this->assertCount(3, $detail->getChargeAdjustments(), 'getChargeAdjustments');

        $this->assertEquals('$8.52', $detail->getNormalFare(), 'getNormalFare');
        $this->assertEquals('$12.78', $detail->getSubtotal(), 'getSubtotal');
        $this->assertEquals('$5.92', $detail->getTotalCharged(), 'getTotalCharged');
        $this->assertNull($detail->getTotalOwed(), 'getTotalOwed');
        $this->assertEquals('USD', $detail->getCurrencyCode(), 'getCurrencyCode');
        $this->assertEquals('00:11:35', $detail->getDuration(), 'getDuration');
        $this->assertEquals('1.49', $detail->getDistance(), 'getDistance');
        $this->assertEquals('miles', $detail->getDistanceLabel(), 'getDistanceLabel');
    }

    /**
     * @depends test_type_getter
     */
    public function test_charge()
    {
        $detail = $this->getRequest()->query(123)->getCharges()[0];
        $this->assertEquals('Base Fare', $detail->getName());
        $this->assertEquals('2.20', $detail->getAmount());
        $this->assertEquals('base_fare', $detail->getType());
    }

    /**
     * @depends test_type_getter
     */
    public function test_surge_charge()
    {
        $detail = $this->getRequest()->query(123)->getSurgeCharge();
        $this->assertEquals('Surge x1.5', $detail->getName());
        $this->assertEquals('4.26', $detail->getAmount());
        $this->assertEquals('surge', $detail->getType());
    }

    /**
     * @depends test_type_getter
     */
    public function test_charge_adjustments()
    {
        $detail = $this->getRequest()->query(123)->getChargeAdjustments()[0];
        $this->assertEquals('Promotion', $detail->getName());
        $this->assertEquals('-2.43', $detail->getAmount());
        $this->assertEquals('promotion', $detail->getType());
    }
}
