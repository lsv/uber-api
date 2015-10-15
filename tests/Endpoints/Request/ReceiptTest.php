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
use Lsv\UberApi\Entity\Request\Detail;
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

        self::assertEquals('GET', $req->getMethod());
        self::assertEquals('/v1/requests/'.$requestId.'/receipt', $req->getUri()->getPath());
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler(null, true);

        $results = (new Receipt($client, true))->query(123);
        self::assertNull($results);
        $results = (new Receipt($client, true))->query(123);
        self::assertNull($results);
    }

    public function test_by_detail()
    {
        $detail = new Detail(123);
        $result = $this->getRequest()->queryByDetail($detail);
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Receipt', $result);
    }

    public function test_by_detail2()
    {
        $detail = new Detail(123);
        $result = $this->getRequest()->query($detail);
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Receipt', $result);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123);
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\Receipt', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123);
        self::assertEquals('b5512127-a134-4bf4-b1ba-fe9f48f56d9d', $detail->getRequestId(), 'getRequestId');
        self::assertCount(3, $detail->getCharges(), 'getCharges');
        self::assertInstanceOf('Lsv\UberApi\Entity\Request\ReceiptSurgeCharge', $detail->getSurgeCharge(), 'getSurgeCharges');
        self::assertCount(3, $detail->getChargeAdjustments(), 'getChargeAdjustments');

        self::assertEquals('$8.52', $detail->getNormalFare(), 'getNormalFare');
        self::assertEquals('$12.78', $detail->getSubtotal(), 'getSubtotal');
        self::assertEquals('$5.92', $detail->getTotalCharged(), 'getTotalCharged');
        self::assertNull($detail->getTotalOwed(), 'getTotalOwed');
        self::assertEquals('USD', $detail->getCurrencyCode(), 'getCurrencyCode');
        self::assertEquals('00:11:35', $detail->getDuration(), 'getDuration');
        self::assertEquals('1.49', $detail->getDistance(), 'getDistance');
        self::assertEquals('miles', $detail->getDistanceLabel(), 'getDistanceLabel');
    }

    /**
     * @depends test_type_getter
     */
    public function test_charge()
    {
        $detail = $this->getRequest()->query(123)->getCharges()[0];
        self::assertEquals('Base Fare', $detail->getName());
        self::assertEquals('2.20', $detail->getAmount());
        self::assertEquals('base_fare', $detail->getType());
    }

    /**
     * @depends test_type_getter
     */
    public function test_surge_charge()
    {
        $detail = $this->getRequest()->query(123)->getSurgeCharge();
        self::assertEquals('Surge x1.5', $detail->getName());
        self::assertEquals('4.26', $detail->getAmount());
        self::assertEquals('surge', $detail->getType());
    }

    /**
     * @depends test_type_getter
     */
    public function test_charge_adjustments()
    {
        $detail = $this->getRequest()->query(123)->getChargeAdjustments()[0];
        self::assertEquals('Promotion', $detail->getName());
        self::assertEquals('-2.43', $detail->getAmount());
        self::assertEquals('promotion', $detail->getType());
    }
}
