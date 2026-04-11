<?php

namespace App\Repositories;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    public function getTransAdmin($data)
    {
        $trans = Transaction::with('produk.provider', 'service', 'user', 'voucher', 'payment');
        if (!empty($data['search'])) {
            $trans->where('order_id', 'like', "%{$data['search']}%");
        }
        if (!empty($data['payment_id'])) {
            $trans->where('payment_id', $data['payment_id']);
        }

        return $trans->latest()->paginate($data['limit']);
    }

    public function getTrans($data)
    {
        $trans = Transaction::select('id', 'user_id', 'produk_id', 'service_id', 'payment_id', 'voucher_id', 'order_id', 'price', 'total', 'discount_amount', 'va_number', 'qr_code', 'status', 'date_exp', 'target_details', 'created_at', 'updated_at')->with('service', 'produk', 'user', 'voucher', 'payment', 'reviews');
        if (!empty($data['search'])) {
            $trans->where('order_id', 'like', "%{$data['search']}%");
        }
        if (!empty($data['payment_id'])) {
            $trans->where('payment_id', $data['payment_id']);
        }

        if (!empty($data['status'])) {
            $trans->where('status', $data['status']);
        }

        if (!empty($data['start_date']) && !empty($data['end_date'])) {
            $start = Carbon::parse($data['start_date'])->startOfDay();
            $end = Carbon::parse($data['end_date'])->endOfDay();

            $trans->whereBetween('created_at', [$start, $end]);
        } elseif (!empty($data['start_date'])) {
            $trans->whereDate('created_at', $data['start_date']);
        }

        return $trans->where('user_id', request()->user()->id)->latest()->paginate($data['limit']);
    }

    public function findExstTrans($id)
    {
        return Transaction::where('order_id', $id)->exists();
    }

    public function findId($id)
    {

        return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->find($id);
    }

    public function firstId($id)
    {
        $user = request()->user();
        if (in_array($user->role->name, ['super_admin', 'administrator'])) {
            return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->find($id);
        }
        return Transaction::select('user_id', 'service_id', 'payment_id', 'voucher_id', 'order_id', 'price', 'total', 'discount_amount', 'va_number', 'qr_code', 'status', 'date_exp', 'target_details')->with('produk', 'service', 'user', 'voucher', 'payment')->where('user_id', $user->id)->where('id', $id)->first();
    }

    public function findByReference($data)
    {
        return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->where('reference', $data['reference'])->where('status', $data['status'])->first();
    }

    public function findTrxId($data)
    {
        return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->whereJsonContains('response_provider', ['trxid' => $data['trxId']])->where('status', $data['status'])->first();
    }

    public function getRevenue($data)
    {
        $trans = Transaction::query();
        if (!empty($data['status'])) {
            $trans->where('status', $data['status']);
        }
        if (!empty($data['month'])) {
            $trans->whereMonth('created_at', $data['month']);
        }
        if (!empty($data['year'])) {
            $trans->whereYear('created_at', $data['year']);
        }
        return $trans->sum('total');
    }

    public function getSalesCount($data)
    {
        $trans = Transaction::query();
        if (!empty($data['status'])) {
            $trans->where('status', $data['status']);
        }
        if (!empty($data['mount'])) {
            $trans->whereMonth('created_at', $data['mount']);
        }
        if (!empty($data['year'])) {
            $trans->whereYear('created_at', $data['year']);
        }
        return $trans->count();
    }

    public function getSpending()
    {
        return Transaction::where('status', 'success')
            ->select(DB::raw('SUM(total) / COUNT(DISTINCT user_id) as avg_per_user'))
            ->first()->avg_per_user ?? 0;
    }

    public function getRevenueStats($type = 'month')
    {
        [$format, $range, $curr] = match ($type) {
            'day'   => ['%H', range(0, 23), today()],
            'year'  => ['%m', range(1, 12), now()->year],
            default => ['%d', range(1, now()->daysInMonth), [now()->month, now()->year]],
        };

        $results = Transaction::where('status', 'success')
            ->where(fn($q) => match ($type) {
                'day'   => $q->whereDate('created_at', $curr),
                'year'  => $q->whereYear('created_at', $curr),
                default => $q->whereMonth('created_at', $curr[0])->whereYear('created_at', $curr[1]),
            })
            ->selectRaw("
            DATE_FORMAT(created_at, '$format') as label,
            SUM(total) as revenue_total,
            COUNT(id) as order_count
        ")
            ->groupBy('label')
            ->get()
            ->keyBy('label');

        return collect($range)->map(function ($i) use ($results, $type) {
            $labelKey = str_pad($i, 2, '0', STR_PAD_LEFT);
            $data = $results->get($labelKey);

            // LOGIC BARU: Jika type 'year', ubah angka jadi nama bulan
            $finalLabel = $i;
            if ($type === 'year') {
                $finalLabel = \Carbon\Carbon::create()->month($i)->format('M'); // Jan, Feb, Mar...
            } elseif ($type === 'day') {
                $finalLabel = $labelKey . ':00'; // 01:00, 02:00...
            }

            return [
                'label'         => $finalLabel,
                'order_count'   => $data ? (int) $data->order_count : 0,
                'revenue_total' => $data ? (float) $data->revenue_total : 0,
            ];
        });
    }

    public function store($data)
    {
        return Transaction::create($data);
    }

    public function update($data, $id)
    {
        $trans = Transaction::find($id);
        if (!$trans) {
            throw new \Exception('data transaksi tidak ditemukan');
        }
        return $trans->update($data);
    }

    public function delete($id)
    {
        $trans = Transaction::find($id);
        if (!$trans) {
            throw new \Exception('data transaksi tidak ditemukan');
        }
        return $trans->delete();
    }
}
