<?php

namespace Dev1kochiCrypto\SitemapKit\Http\Controllers;

use Illuminate\Routing\Controller;
use Dev1kochiCrypto\SitemapKit\Services\SitemapService;
use Dev1kochiCrypto\SitemapKit\Jobs\UpdateSitemapJob;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    protected $sitemapService;

    public function __construct(SitemapService $sitemapService)
    {
        $this->sitemapService = $sitemapService;
    }

    public function index()
    {
        $exists = $this->sitemapService->exists();
        return view('sitemap-automation::admin.sitemap', compact('exists'));
    }

    public function generate(Request $request)
    {
        dispatch(new UpdateSitemapJob());

        return redirect()->back()->with('success', 'Sitemap regeneration has been queued.');
    }
}
