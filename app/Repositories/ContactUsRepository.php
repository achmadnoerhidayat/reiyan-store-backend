<?php

namespace App\Repositories;

use App\Models\ContactUs;

class ContactUsRepository
{
    public function getAll($data)
    {
        return ContactUs::where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('name', 'like', '%' . $data['search'] . '%')->orWhere('order_id', 'like', '%' . $data['search'] . '%');
            }

            if (!empty($data['status'])) {
                $q->where('status', $data['status']);
            }
        })->latest()->paginate($data['limit']);
    }

    public function findId($id)
    {
        return ContactUs::find($id);
    }

    public function store($data)
    {
        return ContactUs::create($data);
    }

    public function update($data, $id)
    {
        $contact = ContactUs::find($id);
        if (!$contact) {
            throw new \Exception('data contact us tidak ditemukan');
        }

        return $contact->update($data);
    }

    public function delete($id)
    {
        $contact = ContactUs::find($id);
        if (!$contact) {
            throw new \Exception('data contact us tidak ditemukan');
        }

        return $contact->delete();
    }
}
