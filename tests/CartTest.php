<?php
declare (strict_types = 1);

use PHPUnit\Framework\TestCase;

final class CartTest extends TestCase
{
    public function testTotalsCalculatesCorrectly(): void
    {
        $items = [
            ['price_cents' => 1999, 'qty' => 2],
            ['price_cents' => 500, 'qty' => 1],
        ];

        $out = Cart::totals($items, 0.08);

        $this->assertSame(4498, $out['subtotal_cents']);
        $this->assertSame(360, $out['tax_cents']);
        $this->assertSame(4858, $out['total_cents']);
    }

    public function testEmptyItemsReturnsZeros(): void
    {
        $out = Cart::totals([], 0.10);

        $this->assertSame(0, $out['subtotal_cents']);
        $this->assertSame(0, $out['tax_cents']);
        $this->assertSame(0, $out['total_cents']);
    }

    public function testInvalidItemThrows(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Cart::totals([['price_cents' => -1, 'qty' => 1]], 0.05);
    }
}