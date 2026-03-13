<?php

namespace Dev1kochiCrypto\SitemapKit\Services;

use Spatie\Sitemap\SitemapGenerator;

class SitemapService
{
    /**
     * Generate the sitemap and write it to the public directory.
     */
    public function generate(): void
    {
        SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));
    }

    /**
     * Check if the sitemap file exists.
     */
    public function exists(): bool
    {
        return file_exists(public_path('sitemap.xml'));
    }
}
