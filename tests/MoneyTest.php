<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
    public function testConvertsSimpleAmount(): void
    {
        $this->assertSame(1999, Money::toCents('19.99'));
    }

    public function testConvertsWithDollarAndCommas(): void 
    {
        $this->assertSame(123450, Money::toCents('$1,234.50'));
    }

    public function testConvertsWholeNumber(): void
    {
        $this->assertSame(1000, Money::toCents('10'));
    }

    public function testRejectInvalidFormat(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Money::toCents('12.345');
    }

}