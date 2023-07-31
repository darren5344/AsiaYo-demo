<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConvertRateTest extends TestCase
{

    protected string $url = '/api/convert-rate';

    /**
     * @dataProvider dataProvider
     *
     * @param string $source
     * @param string $target
     * @param int $amount
     * @param string $expectAmount
     * @throws \Throwable
     */
    public function testPassCases(string $source, string $target, int $amount, string $expectAmount)
    {
        $query = [
            'source' => $source,
            'target' => $target,
            'amount' => $amount
        ];
        $this->url .= '?' . http_build_query($query);
        $response = $this->get($this->url);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'msg',
            'amount'
        ]);
        $result = $response->json('amount');

        $this->assertEquals($expectAmount, $result);
    }

    public function dataProvider()
    {
        $this->createApplication();
        return [
            '100 TWD to USD' => [
                'TWD',
                'USD',
                100,
                '3.28'
            ],
            '100 USD to JPY' => [
                'USD',
                'JPY',
                100,
                '11,180.10'
            ],
            '100 JPY to TWD' => [
                'JPY',
                'TWD',
                100,
                '26.96'
            ],
            '100 TWD to TWD' => [
                'TWD',
                'TWD',
                100,
                '100.00'
            ]
        ];
    }
}
