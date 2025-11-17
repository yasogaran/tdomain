<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Partner;
use App\Models\TeamMember;
use App\Models\Quotation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get current month statistics
        $stats = $this->getStatistics();

        // Get recent quotations (last 10)
        $recentQuotations = Quotation::with(['user' => function($query) {
                $query->select('id', 'name');
            }])
            ->latest()
            ->take(10)
            ->get();

        // Get monthly quotations chart data (last 6 months)
        $quotationsChart = $this->getQuotationsChartData();

        // Get status breakdown
        $statusBreakdown = $this->getStatusBreakdown();

        return view('admin.dashboard', compact(
            'stats',
            'recentQuotations',
            'quotationsChart',
            'statusBreakdown'
        ));
    }

    /**
     * Get current statistics with trends
     */
    private function getStatistics()
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $lastMonth = Carbon::now()->subMonth()->startOfMonth();

        // Projects statistics
        $totalProjects = Project::count();
        $publishedProjects = Project::where('status', 'published')->count();
        $projectsThisMonth = Project::where('created_at', '>=', $currentMonth)->count();
        $projectsLastMonth = Project::whereBetween('created_at', [$lastMonth, $currentMonth])->count();

        // Partners statistics
        $totalPartners = Partner::count();
        $activePartners = Partner::where('status', 'active')->count();
        $partnersThisMonth = Partner::where('created_at', '>=', $currentMonth)->count();
        $partnersLastMonth = Partner::whereBetween('created_at', [$lastMonth, $currentMonth])->count();

        // Team statistics
        $totalTeam = TeamMember::count();
        $teamThisMonth = TeamMember::where('created_at', '>=', $currentMonth)->count();
        $teamLastMonth = TeamMember::whereBetween('created_at', [$lastMonth, $currentMonth])->count();

        // Quotations statistics
        $totalQuotations = Quotation::count();
        $pendingQuotations = Quotation::where('status', 'new')->count();
        $quotationsThisMonth = Quotation::where('created_at', '>=', $currentMonth)->count();
        $quotationsLastMonth = Quotation::whereBetween('created_at', [$lastMonth, $currentMonth])->count();

        return [
            'projects' => [
                'total' => $totalProjects,
                'published' => $publishedProjects,
                'trend' => $this->calculateTrend($projectsThisMonth, $projectsLastMonth),
            ],
            'partners' => [
                'total' => $totalPartners,
                'active' => $activePartners,
                'trend' => $this->calculateTrend($partnersThisMonth, $partnersLastMonth),
            ],
            'team' => [
                'total' => $totalTeam,
                'trend' => $this->calculateTrend($teamThisMonth, $teamLastMonth),
            ],
            'quotations' => [
                'total' => $totalQuotations,
                'pending' => $pendingQuotations,
                'trend' => $this->calculateTrend($quotationsThisMonth, $quotationsLastMonth),
            ],
        ];
    }

    /**
     * Calculate trend percentage
     */
    private function calculateTrend($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? ['direction' => 'up', 'value' => '100%'] : null;
        }

        $percentage = (($current - $previous) / $previous) * 100;

        return [
            'direction' => $percentage >= 0 ? 'up' : 'down',
            'value' => abs(round($percentage, 1)) . '%',
        ];
    }

    /**
     * Get quotations chart data for last 6 months
     */
    private function getQuotationsChartData()
    {
        $months = [];
        $data = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = $date->format('M Y');

            $count = Quotation::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $data[] = $count;
        }

        return [
            'labels' => $months,
            'data' => $data,
        ];
    }

    /**
     * Get quotation status breakdown
     */
    private function getStatusBreakdown()
    {
        return Quotation::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    }
}
