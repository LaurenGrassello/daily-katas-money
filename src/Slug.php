<?php
declare(strict_types=1);

final class Slug
{
    public static function from(string $input): string 
    {
        $s = trim($input);

        if ($s === '') {
            throw new InvalidArgumentException('Slug input cannot be empty.');
        }
        
        $s = str_replace('+', ' plus', $s);
        
        $s = strtolower($s);

        $s = preg_replace('/[\s_]+/', '-', $s) ?? $s;

        $s = preg_replace('/[^a-z0-9-]/', '-', $s) ?? $s;

        $s = preg_replace('/-+/', '-', $s) ?? $s;

        $s = trim($s, '-');

        if ($s === '') {
            throw new InvalidArgumentException('Slug input produced empty slug.');
        }

        return $s;
    }
}