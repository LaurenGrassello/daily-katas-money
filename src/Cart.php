<?php
declare (strict_types = 1);

final class Cart
{
    public static function totals(array $items, float $taxRate): array
    {
        $subtotal = 0;

        foreach ($items as $item) {
            $price = $item['price_cents'] ?? null;
            $qty = $item['qty'] ?? null;

            if (!is_int($price) || $price < 0 || !is_int($qty) || $qty < 1) {
                throw new InvalidArgumentException('Each item must have int price_cents >= 0 and int qty >= 1');
            }
            $subtotal += ($price * $qty);
        }

        if ($taxRate < 0) {
            throw new InvalidArgumentException('taxRate must be >= 0');
        }

        $tax = (int) round($subtotal * $taxRate);
        $total = $subtotal + $tax;

        return [
            'subtotal_cents' => $subtotal,
            'tax_cents' => $tax,
            'total_cents' => $total,
        ];
    }
}