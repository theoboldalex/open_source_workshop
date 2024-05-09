<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider YoloProvider
     */
    public function test_add_two_numbers($a, $b, $e): void
    {
        $response = $this->get("/add/$a/$b")
            ->assertStatus(200);

        $this->assertEquals($response->decodeResponseJson()['dR'], $e);
    }

    public static function yoloProvider(): \Generator
    {
        yield '2 + 2 = 4' => [2,2,4];
        yield '3 + 2 = 5' => [3,2,5];
    }
}
