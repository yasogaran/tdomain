<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraphicPortfolio;
use App\Models\GraphicPortfolioMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class GraphicPortfolioController extends Controller
{
    /**
     * Display a listing of graphic portfolios
     */
    public function index()
    {
        $portfolios = GraphicPortfolio::with('media')->orderBy('order')->paginate(20);
        return view('admin.graphic-portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio
     */
    public function create()
    {
        return view('admin.graphic-portfolios.create');
    }

    /**
     * Store a newly created portfolio
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:graphic_portfolios,slug',
            'about' => 'required|string',
            'description' => 'required|string',
            'keywords' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'status' => 'required|in:draft,published',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set order to last
        $validated['order'] = GraphicPortfolio::max('order') + 1;

        $portfolio = GraphicPortfolio::create($validated);

        return redirect()
            ->route('admin.graphic-portfolios.edit', $portfolio)
            ->with('success', 'Portfolio created successfully! Now add images to your portfolio.');
    }

    /**
     * Display the specified portfolio
     */
    public function show(GraphicPortfolio $graphicPortfolio)
    {
        $graphicPortfolio->load('media');
        return view('admin.graphic-portfolios.show', compact('graphicPortfolio'));
    }

    /**
     * Show the form for editing the specified portfolio
     */
    public function edit(GraphicPortfolio $graphicPortfolio)
    {
        $graphicPortfolio->load('media');
        return view('admin.graphic-portfolios.edit', compact('graphicPortfolio'));
    }

    /**
     * Update the specified portfolio
     */
    public function update(Request $request, GraphicPortfolio $graphicPortfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:graphic_portfolios,slug,' . $graphicPortfolio->id,
            'about' => 'required|string',
            'description' => 'required|string',
            'keywords' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'status' => 'required|in:draft,published',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $graphicPortfolio->update($validated);

        return redirect()
            ->route('admin.graphic-portfolios.edit', $graphicPortfolio)
            ->with('success', 'Portfolio updated successfully!');
    }

    /**
     * Remove the specified portfolio
     */
    public function destroy(GraphicPortfolio $graphicPortfolio)
    {
        // Delete all associated media
        foreach ($graphicPortfolio->media as $media) {
            if ($media->file_path) {
                Storage::disk('public')->delete($media->file_path);
            }
            $media->delete();
        }

        $graphicPortfolio->delete();

        return redirect()
            ->route('admin.graphic-portfolios.index')
            ->with('success', 'Portfolio deleted successfully!');
    }

    /**
     * Upload media for a portfolio
     */
    public function uploadMedia(Request $request, GraphicPortfolio $graphicPortfolio)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:10240',
            'caption' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $path = $this->uploadImage($file);

        $order = $graphicPortfolio->media()->max('order') + 1;

        $media = $graphicPortfolio->media()->create([
            'type' => 'image',
            'file_path' => $path,
            'caption' => $request->input('caption'),
            'order' => $order,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Image uploaded successfully!',
            'media' => $media,
        ]);
    }

    /**
     * Delete portfolio media
     */
    public function deleteMedia(GraphicPortfolioMedia $media)
    {
        if ($media->file_path) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully!',
        ]);
    }

    /**
     * Update media caption
     */
    public function updateMediaCaption(Request $request, GraphicPortfolioMedia $media)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        $media->update([
            'caption' => $request->input('caption'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Caption updated successfully!',
        ]);
    }

    /**
     * Reorder portfolio media
     */
    public function reorderMedia(Request $request)
    {
        $request->validate([
            'media' => 'required|array',
            'media.*.id' => 'required|exists:graphic_portfolio_media,id',
            'media.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->media as $item) {
            GraphicPortfolioMedia::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Images reordered successfully!',
        ]);
    }

    /**
     * Upload and optimize image
     */
    private function uploadImage($file)
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = 'graphic-portfolios/' . $filename;

        // Resize and optimize image
        $image = Image::read($file)
            ->scaleDown(width: 1200)
            ->toJpeg(quality: 90);

        Storage::disk('public')->put($path, (string) $image);

        return $path;
    }
}
