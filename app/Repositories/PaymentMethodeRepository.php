<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentMethodeRepository
{
    public function getAll($data)
    {
        return PaymentMethod::where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('name', 'like', "%{$data['search']}%")->orWhere('code', 'like', "%{$data['search']}%");
            }
            if (!empty($data['is_active'])) {
                $q->where('is_active', $data['is_active']);
            }
        })->latest()->limit(4)->get()->groupBy(function ($item) {
            return strtolower(str_replace(' ', '_', $item->category));
        });
    }

    public function findId($id)
    {
        return PaymentMethod::find($id);
    }

    public function store(array $data)
    {
        return PaymentMethod::create($data);
    }

    public function update(array $data, $id)
    {
        $payment = PaymentMethod::find($id);
        if (!$payment) {
            return null;
        }
        return $payment;
        $payment->update($data);
    }

    public function delete($id)
    {
        $payment = PaymentMethod::find($id);
        if (!$payment) {
            return null;
        }
        $payment->delete();
        return $payment;
    }
}
