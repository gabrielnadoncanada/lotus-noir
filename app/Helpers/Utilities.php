<?php

if (! function_exists('theme')) {
    function theme($key)
    {
        return app(App\Settings\ThemeSettings::class)->$key;
    }
}

if (! function_exists('checked')) {
    function checked($value, $test)
    {
        return $value === $test ? 'checked' : '';
    }
}

if (! function_exists('selected')) {
    function selected($value, $test)
    {
        return $value === $test ? 'selected' : '';
    }
}

if (! function_exists('random_password')) {
    function random_password(): string
    {
        $random = str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');

        return substr($random, 0, 10);
    }
}

if (! function_exists('untrailing_slash_it')) {
    function untrailing_slash_it(string $string): string
    {
        return rtrim($string, '/\\');
    }
}

if (! function_exists('trailing_slash_it')) {
    function trailing_slash_it(string $string): string
    {
        if ($string != config('app.url')) {
            return untrailing_slash_it($string) . '/';
        }

        return $string;
    }
}

if (! function_exists('active_route')) {
    function active_route(string $route, $active = true, $default = false)
    {
        if (url()->current() == $route) {
            return $active;
        }

        return $default;
    }
}

if (! function_exists('class_has_trait')) {
    function class_has_trait($class, $trait): bool
    {
        return in_array($trait, class_uses($class));
    }
}

if (! function_exists('explodeNewline')) {
    function explodeNewline($string)
    {
        $newlinePos = strrpos($string, "\n");
        if ($newlinePos !== false) {
            $part1 = substr($string, 0, $newlinePos);
            $part2 = substr($string, $newlinePos + 1);
        } else {
            $part1 = $string;
            $part2 = '';
        }

        return [str_replace("\n", '', $part1), str_replace("\n", '', $part2)];
    }
}
