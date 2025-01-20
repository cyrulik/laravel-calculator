<?php

namespace Tests\Feature\Controller\API;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CalculatorControllerTest extends TestCase
{
    #[DataProvider('operationsDataProvider')]
    public function testItCalculatesValidData(string $operation, float $a, float $b, float $result): void
    {
        $response = $this->postJson(route('calculate'), compact('operation', 'a', 'b'));

        $response->assertStatus(200);
        $response->assertJson(compact('result'));
    }

    public static function operationsDataProvider(): array
    {
        return [
            ['addition', 1, 2, 3.0],
            ['subtraction', 1, 2, -1.0],
            ['multiplication', 2, 3, 6.0],
            ['division', 6, 3, 2.0],
        ];
    }
}
