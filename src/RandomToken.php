<?php

namespace YumaIt\RandomToken;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Random\RandomException;

class RandomToken
{
    /**
     * Generate a random token.
     *
     * @param  int  $length  The length of the token.
     *
     * @throws RandomException
     */
    public static function generate(int $length = 6): string
    {
        $rand = collect([
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'M', 'N', 'P', 'R', 'T', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '7', '8', '9',
        ])
            // @phpstan-ignore-next-line
            ->pipe(fn ($c) => Collection::times($length, fn () => $c[random_int(0, 27)]))
            ->implode('');

        // Check if the value is bad.
        if (! static::checkValue($rand)) {
            return static::generate($length);
        }

        return $rand;
    }

    /**
     * Check if a value contains any bad words.
     */
    protected static function checkValue(string $value): bool
    {
        $lang = trans('random-token::badwords');

        foreach ($lang as $word) {
            // Basic Search
            if (Str::contains($value, $word, true)) {
                return false;
            }

            // Replaced version
            $cleanValue = Str::replace(['5', '4', 'V', '1'], ['S', 'H', 'U', 'I'], $value);
            // @phpstan-ignore function.impossibleType
            if (is_array($cleanValue)) {
                $cleanValue = implode('', $cleanValue);
            }
            if (Str::contains($cleanValue, $word, true)) {
                return false;
            }
        }

        return true;
    }
}
