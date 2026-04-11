<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request, TransactionService $transService, AuthService $authService)
    {
        $type = $request->input('type');
        $now = now();
        $lastMonth = now()->subMonth();

        $revenueNow = $transService->firstRevenue([
            'status' => 'success',
            'month' => $now->month,
            'year' => $now->year,
        ]);

        $revenueLastMonth = $transService->firstRevenue([
            'status' => 'success',
            'month' => $lastMonth->month,
            'year' => $lastMonth->year,
        ]);

        $revenue_trend = $revenueLastMonth > 0
            ? (($revenueNow - $revenueLastMonth) / $revenueLastMonth) * 100
            : 100;

        $saleseNow = $transService->firstSales([
            'status' => 'success',
            'month' => $now->month,
            'year' => $now->year,
        ]);

        $salesLastMonth = $transService->firstSales([
            'status' => 'success',
            'month' => $lastMonth->month,
            'year' => $lastMonth->year,
        ]);

        $sales_trend = $salesLastMonth > 0
            ? (($saleseNow - $salesLastMonth) / $salesLastMonth) * 100
            : 100;

        $spending = $transService->firstSpending();

        $customer = $authService->firstCount();

        $revenue_statistik = $transService->getRevenueStats($type);
        return ResponseFormated::success([
            'revenue' => $revenueNow,
            'revenue_trend' => round($revenue_trend, 2),
            'revenue_statistik' => $revenue_statistik,
            'sales' => $saleseNow,
            'sales_trend' => round($sales_trend, 2),
            'spending' => round($spending, 2),
            'customer' => $customer,
        ], 'data dashboad berhasil ditampilkan');
    }
}
