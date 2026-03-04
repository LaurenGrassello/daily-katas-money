<?php
declare(strict_types=1);

final class Money
{
    public static function toCents(string $amount): int
    {
        $raw = trim($amount);

        if ($raw === '') {
            throw new InvalidArgumentException('Amount cannot be empty');
        }

        $raw = str_replace(['$', ','], '', $raw);

        if (!preg_match('/^\d+(\.\d{1,2})?$/', $raw)) {
            throw new InvalidArgumentException("Invalid amount format: {$amount}");
        }

        $parts = explode('.', $raw);
        $dollars = (int) $parts[0];
        $cents = isset($parts[1]) ? str_pad($parts[1], 2, '0') : '00';

        return ($dollars * 100) + (int) $cents;

    }
}