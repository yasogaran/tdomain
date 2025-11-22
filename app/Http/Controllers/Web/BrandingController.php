<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\GraphicPortfolio;
use Illuminate\View\View;

class BrandingController extends Controller
{
    /**
     * Display branding packages page with services and portfolios
     */
    public function index(): View
    {
        $portfolios = GraphicPortfolio::with('media')
            ->published()
            ->orderBy('order')
            ->get();

        return view('pages.branding-packages', compact('portfolios'));
    }

    /**
     * Display individual portfolio detail page
     */
    public function show(string $slug): View
    {
        $portfolio = GraphicPortfolio::with(['media' => function ($query) {
            $query->orderBy('order');
        }])
            ->published()
            ->bySlug($slug)
            ->firstOrFail();

        // Get related portfolios (same keywords)
        $relatedPortfolios = collect();

        if ($portfolio->keywords) {
            $keywords = $portfolio->keywords_array;

            $relatedPortfolios = GraphicPortfolio::with('media')
                ->published()
                ->where('id', '!=', $portfolio->id)
                ->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('keywords', 'like', '%' . $keyword . '%');
                    }
                })
                ->inRandomOrder()
                ->limit(3)
                ->get();
        }

        // If we don't have 3 related, fill with random published portfolios
        if ($relatedPortfolios->count() < 3) {
            $needed = 3 - $relatedPortfolios->count();
            $excludeIds = $relatedPortfolios->pluck('id')->push($portfolio->id)->toArray();

            $additionalPortfolios = GraphicPortfolio::with('media')
                ->published()
                ->whereNotIn('id', $excludeIds)
                ->inRandomOrder()
                ->limit($needed)
                ->get();

            $relatedPortfolios = $relatedPortfolios->merge($additionalPortfolios);
        }

        return view('pages.branding-package-detail', compact('portfolio', 'relatedPortfolios'));
    }
}
