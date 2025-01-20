<?php

namespace Tests\Feature\Controller;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CalculatorControllerTest extends TestCase
{
    public function testItDisplaysTheInitialCalculatorAsHome(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewIs('calculator.index');
        $response->assertViewMissing('result');
    }

    public function testItCalculatesValidData(): void
    {
        $response = $this->post(route('calculate'), [
            'operation' => 'addition',
            'a' => 1,
            'b' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('calculator.index');
        $response->assertViewHas('result', 3.0);
    }

    #[DataProvider('invalidOperationsDataProvider')]
    public function testItCalculatesInvalidData(string $operation, mixed $a, mixed $b, string $errorField): void
    {
        $response = $this->post(route('calculate'), [
            'operation' => $operation,
            'a' => $a,
            'b' => $b,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors($errorField);
    }

    public static function invalidOperationsDataProvider(): array
    {
        return [
            ['foo', 2, 1, 'operation'],
            ['addition', 'foo', 1, 'a'],
            ['addition', 2, 'foo', 'b'],
        ];
    }
}
