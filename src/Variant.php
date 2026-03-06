<?php
declare(strict_types=1);

final class Variant
{
    public static function generate(array $options): array
    {
        if ($options === []) {
            return [];
        }

        foreach ($options as $name => $values) {
            if (!is_array($values) || $values === []) {
                return [];
            }
        }

        $result = [[]];

        foreach ($options as $name => $values) {
            $next = [];

            foreach ($result as $combo) {
                foreach ($values as $value) {
                    $newCombo = $combo;
                    $newCombo[$name] = $value;
                    $next[] = $newCombo;
                }
            }
            $result = $next;
        }
        return $result;
    }
}