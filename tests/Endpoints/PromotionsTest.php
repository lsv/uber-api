<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Endpoints;

use Lsv\UberApi\Endpoints\Promotions;
use Lsv\UberApiTest\AbstractTestCase;

class PromotionsTest extends AbstractTestCase
{
    private function getRequest()
    {
        return new Promotions($this->getFileResultsHandler('promotions.json'), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query($this->getCoordinates(), $this->getCoordinates());
        $req = $request->getRequest();

        self::assertEquals('GET', $req->getMethod());
        self::assertEquals('/v1/promotions', $req->getUri()->getPath());
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates());
        self::assertInstanceOf('Lsv\UberApi\Entity\Promotion', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query($this->getCoordinates(), $this->getCoordinates());
        self::assertEquals('Free ride up to $20', $detail->getDisplayText());
        self::assertEquals('$20', $detail->getLocalizedValue());
        self::assertEquals('trip_credit', $detail->getType());
        self::assertEquals(20, $detail->getValue());
        self::assertEquals('USD', $detail->getCurrencyCode());
    }
}
