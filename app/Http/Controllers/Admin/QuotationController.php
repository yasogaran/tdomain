<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of quotations
     */
    public function index(Request $request)
    {
        $query = Quotation::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $quotations = $query->latest()->paginate(20);

        return view('admin.quotations.index', compact('quotations'));
    }

    /**
     * Display the specified quotation
     */
    public function show(Quotation $quotation)
    {
        return view('admin.quotations.show', compact('quotation'));
    }

    /**
     * Update the specified quotation
     */
    public function update(Request $request, Quotation $quotation)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,contacted,converted,rejected',
            'notes' => 'nullable|string',
        ]);

        $quotation->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Quotation updated successfully!',
            ]);
        }

        return redirect()
            ->route('admin.quotations.show', $quotation)
            ->with('success', 'Quotation updated successfully!');
    }

    /**
     * Remove the specified quotation (admin only)
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Quotation deleted successfully!',
            ]);
        }

        return redirect()
            ->route('admin.quotations.index')
            ->with('success', 'Quotation deleted successfully!');
    }

    /**
     * Export quotations to CSV
     */
    public function export(Request $request)
    {
        $query = Quotation::query();

        // Filter by status if provided
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $quotations = $query->latest()->get();

        $filename = 'quotations_' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($quotations) {
            $file = fopen('php://output', 'w');

            // Add headers
            fputcsv($file, [
                'ID',
                'Date',
                'Name',
                'Company',
                'Email',
                'Phone',
                'Service Type',
                'Budget',
                'Timeline',
                'Status',
                'Description',
                'Notes',
            ]);

            // Add data
            foreach ($quotations as $quotation) {
                fputcsv($file, [
                    $quotation->id,
                    $quotation->created_at->format('Y-m-d H:i:s'),
                    $quotation->name,
                    $quotation->company,
                    $quotation->email,
                    $quotation->phone,
                    $quotation->service_type,
                    $quotation->budget,
                    $quotation->timeline,
                    $quotation->status,
                    $quotation->description,
                    $quotation->notes,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
