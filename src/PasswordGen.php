<?php

namespace domainregistrar\PasswordGenerator;

class PasswordGen
{

    /**
     * Generate Random Password
     *
     * @param int  $length
     * @param bool $upper
     * @param bool $lower
     * @param int  $number
     * @param int  $special
     *
     * @return string
     */
    public static function generate(int $length = 16,
                                    bool $upper = true,
                                    bool $lower = true,
                                    int $number = 2,
                                    int $special = 2): string
    {
        // Validate to ensure able to meet requirements within the given length.
        if($number + $special + (int)$upper + (int)$lower > $length)
        {
            throw new \LengthException("Insufficient length to fulfil password requirements.");
        }

        $password_arr = [];
        $requiredAlpha = $length - $special - $number;

        $chars = [];
        if($lower)
        {
            $range = range('a', 'z');
            $chars = array_merge($chars, $range);

            // Enforces minimum of 1 Lowercase character when required.
            $requiredAlpha--;
            $password_arr[] = $range[array_rand($range, 1)];
        }
        if($upper)
        {
            $range = range('A', 'Z');
            $chars = array_merge($chars, $range);

            // Enforces minimum of 1 Uppercase character when required.
            $requiredAlpha--;
            $password_arr[] = $range[array_rand($range, 1)];
        }

        // Looping to enable multiples of same character also allows inclusion of more than 26 characters
        for($i = 0; $i < $requiredAlpha; $i++)
        {
            $rand_char = array_rand($chars, 1);
            $password_arr[] = $chars[$rand_char];
        }

        $special_chars = self::randSpecial($special);
        $password_arr = array_merge($password_arr, $special_chars);

        $digits = self::randNumber($number);
        $password_arr = array_merge($password_arr, $digits);

        shuffle($password_arr);

        return implode('', $password_arr);
    }


    public static function randSpecial(int $len): array
    {
        $specialChars = ['@','%','!', '?', '*', '^', '&'];
        $return = [];

        // Looping to enable multiples of same special character also allows inclusion of more special characters than the number provided
        for($i = 0; $i < $len; $i++)
        {
            $rand_special_char = array_rand($specialChars, 1);

            $return[] = $specialChars[$rand_special_char];
        }

        return $return;
    }

    public static function randNumber(int $len): array
    {
        $digits = range(0, 9);
        $return = [];

        // Looping to enable multiples of same digit
        for($i = 0; $i < $len; $i++)
        {
            $rand_digit = array_rand($digits, 1);

            $return[] = $digits[$rand_digit];
        }

        return $return;
    }
}