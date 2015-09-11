<?php
namespace Lsv\UberApiTest\Endpoints\Request;

use Lsv\UberApi\Endpoints\Request\Estimate;
use Lsv\UberApiTest\AbstractTestCase;

class EstimateTest extends AbstractTestCase
{

    /**
     * @return Estimate
     */
    private function getRequest()
    {
        return new Estimate($this->getFileResultsHandler('estimate.json', true), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query(123, $this->getCoordinates());
        $req = $request->getRequest();

        $this->assertEquals('POST', $req->getMethod());
        $this->assertEquals('/v1/requests/estimate', $req->getUri()->getPath());
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler(null, true);

        $results = (new Estimate($client, true))->query(123, $this->getCoordinates(), $this->getCoordinates());
        $this->assertNull($results);
        $results = (new Estimate($client, true))->query(123, $this->getCoordinates(), $this->getCoordinates());
        $this->assertNull($results);
    }

    public function test_count_results()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\Estimate', $result);
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $detail = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $this->assertEquals(2, $detail->getPickupEstimate());
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\EstimatePrice', $detail->getPrice());
        $this->assertInstanceOf('Lsv\UberApi\Entity\Request\EstimateTrip', $detail->getTrip());
    }

    /**
     * @depends test_type_getter
     */
    public function test_price_getter()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $detail = $result->getPrice();

        $this->assertEquals('https://api.uber.com/v1/surge-confirmations/7d604f5e', $detail->getSurgeConfirmationHref());
        $this->assertEquals(6, $detail->getHighEstimate());
        $this->assertEquals('7d604f5e', $detail->getSurgeConfirmationId());
        $this->assertEquals(5, $detail->getMinimum());
        $this->assertEquals(5, $detail->getLowEstimate());
        $this->assertEquals(1.2, $detail->getSurgeMultiplier());
        $this->assertEquals('$5-6', $detail->getDisplay());
        $this->assertEquals('USD', $detail->getCurrencyCode());

    }

    /**
     * @depends test_type_getter
     */
    public function test_trip_getter()
    {
        $result = $this->getRequest()->query(123, $this->getCoordinates(), $this->getCoordinates());
        $detail = $result->getTrip();

        $this->assertEquals('mile', $detail->getDistanceUnit());
        $this->assertEquals(9, $detail->getDurationEstimate());
        $this->assertEquals(2.1, $detail->getDistanceEstimate());
    }

}
