<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class VariantTest extends TestCase
{
    public function testGeneratesAllCombinations(): void
    {
        $options = [
            'Size' => ['S', 'M'],
            'Color' => ['Red', 'Blue'],
        ];

        $expected = [
            ['Size' => 'S', 'Color' => 'Red'],
            ['Size' => 'S', 'Color' => 'Blue'],
            ['Size' => 'M', 'Color' => 'Red'],
            ['Size' => 'M', 'Color' => 'Blue'],
        ];

        $this->assertSame($expected, Variant::generate($options));
    }

    public function testEmptyOptionsReturnsEmptyArray(): void 
    {
        $this->assertSame([], Variant::generate([]));
    }

    public function testOptionWithEmptyValuesReturnsEmptyArray(): void 
    {
        $options = [
            'Size' => [],
            'Color' => ['Red'],
        ];

        $this->assertSame([], Variant::generate($options));
    }

    public function testSingleOptionReturnsOneDimensionalCombos(): void 
    {
        $options = [
            'Size' => ['S', 'M'],
        ];

        $expected = [
            ['Size' => 'S'],
            ['Size' => 'M'],
        ];

        $this->assertSame($expected, Variant::generate($options));
    }
}