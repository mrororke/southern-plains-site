<?php

namespace App\Services;

class TrickVideoService
{
    public static function normalizeUrl(string $url): string
    {
        $parts = parse_url($url);

        if (!isset($parts['scheme']) || !isset($parts['host'])) {
            return trim($url);
        }

        $clean = $parts['scheme'] . '://' . $parts['host'];

        if (!empty($parts['path'])) {
            $clean .= $parts['path'];
        }

        return rtrim($clean, '/');
    }

    public static function detectPlatform(string $url): string
    {
        return match (true) {
            str_contains($url, 'tiktok') => 'tiktok',
            str_contains($url, 'instagram') => 'instagram',
            str_contains($url, 'facebook') => 'facebook',
            str_contains($url, 'youtu') => 'youtube',
            default => 'unknown',
        };
    }
}