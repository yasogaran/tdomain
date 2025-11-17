<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of partners
     */
    public function index()
    {
        return view('admin.partners.index');
    }

    /**
     * Store a newly created partner
     */
    public function store(PartnerRequest $request)
    {
        $data = $request->validated();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo_path'] = $this->uploadLogo($request->file('logo'));
        }

        // Set order to last
        $data['order'] = Partner::max('order') + 1;
        $data['status'] = $data['status'] ?? 'active';

        Partner::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Partner added successfully!'
        ]);
    }

    /**
     * Update the specified partner
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        $data = $request->validated();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partner->logo_path) {
                Storage::disk('public')->delete($partner->logo_path);
            }
            $data['logo_path'] = $this->uploadLogo($request->file('logo'));
        }

        $partner->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Partner updated successfully!'
        ]);
    }

    /**
     * Remove the specified partner
     */
    public function destroy(Partner $partner)
    {
        // Delete logo
        if ($partner->logo_path) {
            Storage::disk('public')->delete($partner->logo_path);
        }

        $partner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Partner deleted successfully!'
        ]);
    }

    /**
     * Reorder partners
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'partners' => 'required|array',
            'partners.*.id' => 'required|exists:partners,id',
            'partners.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->partners as $item) {
            Partner::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Partners reordered successfully!'
        ]);
    }

    /**
     * Upload and optimize logo
     */
    private function uploadLogo($file)
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = 'partners/' . $filename;

        // Resize and optimize logo (Intervention Image v3 syntax)
        $image = Image::read($file)
            ->scaleDown(width: 400)
            ->toPng();

        Storage::disk('public')->put($path, (string) $image);

        return $path;
    }
}
