<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Service;

class ProdukRepository
{
    public function getAll($data)
    {
        $produk = Product::with(['kategori', 'provider', 'layanan' => function ($query) {
            $query->orderBy('price_provider', 'asc');
        }, 'faq']);

        if (!empty($data['kategori_id'])) {
            $produk = $produk->whereHas('kategori', function ($q) use ($data) {
                $q->where('id', $data['kategori_id']);
            });
        }

        if (!empty($data['search'])) {
            $produk = $produk->where('name', 'like', '%' . $data['search'] . '%');
        }

        if (!empty($data['code'])) {
            $produk = $produk->where('name', 'like', '%' . $data['code'] . '%');
        }

        $produk = $produk->orderBy('sale', 'desc')->paginate($data['limit']);

        return $produk;
    }

    public function findId($id)
    {
        return Product::with('kategori')->find($id);
    }

    public function findLayannById($id)
    {
        return Service::find($id);
    }

    public function findSlug($slug)
    {
        return Product::with(['kategori', 'layanan' => function ($query) {
            $query->orderBy('price_provider', 'asc');
        }, 'faq'])->where('slug', $slug)->first();
    }

    public function store(array $data)
    {
        $produk = Product::updateOrCreate([
            'name' => $data['name'],
            'code' => $data['code'],
        ], $data);
        if (isset($data['faq'])) {
            $faqIds = [];

            foreach ($data['faq'] as $item) {
                $faq = $produk->faq()->updateOrCreate(
                    [
                        'question' => $item['question']
                    ],
                    $item
                );
                $faqIds[] = $faq->id;
            }

            $produk->faq()->whereNotIn('id', $faqIds)->delete();
        }
        return $produk;
    }

    public function update(array $data, $id)
    {
        $produk = Product::find($id);
        if ($produk) {
            $produk->update($data);

            if (isset($data['faq'])) {
                $faqIds = [];

                foreach ($data['faq'] as $item) {
                    $faq = $produk->faq()->updateOrCreate(
                        [
                            'id' => $item['id'],
                            'question' => $item['question'],
                        ],
                        $item
                    );
                    $faqIds[] = $faq->id;
                }

                $produk->faq()->whereNotIn('id', $faqIds)->delete();
            }
        }
        return $produk;
    }

    public function delete($id)
    {
        $produk = Product::find($id);
        if ($produk) {
            $produk->delete();
        }
        return $produk;
    }

    public function storeLayanan($id, $data)
    {
        $produk = Product::find($id);
        if ($produk) {
            return Service::updateOrCreate(
                [
                    'produk_id' => $produk->id,
                    'code' => $data['code'],
                ],
                $data
            );
        }
    }
}
