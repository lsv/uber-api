<?php
namespace Lsv\UberApiTest\Request;

use Lsv\UberApi\Request\Promotions;
use Lsv\UberApiTest\AbstractTestCase;

class PromotionsTest extends AbstractTestCase
{

    private function getProductTypes()
    {
        return new Promotions($this->getFileResultsHandler('promotions.json'), 123, true);
    }

    public function test_count_results()
    {
        $results = $this->getProductTypes()->query($this->getCoordinates(), $this->getCoordinates());
        $this->assertEquals(1, count($results));
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getProductTypes()->query($this->getCoordinates(), $this->getCoordinates());
        $this->assertEquals('Free ride up to $20', $detail->getDisplayText());
        $this->assertEquals('$20', $detail->getLocalizedValue());
        $this->assertEquals('trip_credit', $detail->getType());
        $this->assertEquals(20, $detail->getValue());
        $this->assertEquals('USD', $detail->getCurrencyCode());
    }

}
