<?php

namespace App\Services;

use App\Repositories\RatingRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\DB;

class RatingService
{

    protected $ratingRepo;
    protected $transRepo;

    public function __construct(RatingRepository $ratingRepo, TransactionRepository $transRepo)
    {
        $this->ratingRepo = $ratingRepo;
        $this->transRepo = $transRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        $user = request()->user();
        return $this->ratingRepo->getAll([
            'produk_id' => $data['produk_id'],
            'user_id' => $user->id,
            'limit' => $data['limit'],
        ]);
    }

    public function getAdmin($data)
    {
        return $this->ratingRepo->getAll($data);
    }

    public function findId($id)
    {
        return $this->ratingRepo->findId($id);
    }

    public function createRating($data)
    {
        return DB::transaction(function () use ($data) {
            $user = request()->user();
            $data['user_id'] = $user->id;

            $transaksi = $this->transRepo->findId($data['transaksi_id']);

            if (!$transaksi) {
                throw new \Exception('Transaksi tidak ditemukan.');
            }

            if ($transaksi->status !== 'success') {
                throw new \Exception('Selesaikan pembayaran dulu baru bisa kasih ulasan!');
            }

            $rating = $this->ratingRepo->findRatingByTrans([
                'transaksi_id' => $data['transaksi_id'],
                'user_id' => $data['user_id'],
            ]);

            if ($rating) {
                throw new \Exception('Rating sudah anda ulas, gunakan fitur edit jika ingin mengubah.');
            }

            return $this->ratingRepo->store($data);
        });
    }

    public function updateRating($data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $user = request()->user();
            $rating = $this->ratingRepo->findId($id);

            if (!$rating) {
                throw new \Exception('Rating tidak ditemukan.');
            }

            if (!in_array($user->role->name, ['administrator', 'super_admin'])) {

                if ($rating->user_id !== $user->id) {
                    throw new \Exception('Anda tidak memiliki akses untuk mengubah ulasan ini');
                }

                if ($rating->edit_count >= 1) {
                    throw new \Exception('Batas revisi ulasan telah tercapai.');
                }

                return $this->ratingRepo->update([
                    'rating' => $data['rating'],
                    'comment' => $data['comment'],
                    'edit_count' => $rating->edit_count + 1,
                ], $id);
            }

            $request = [
                'replied_by' => $user->id,
            ];

            if (isset($data['is_publish'])) {
                $request['is_publish'] = $data['is_publish'];
            }

            if (isset($data['reply_message'])) {
                $request['reply_message'] = $data['reply_message'];
                $request['replied_at'] = now();
            }

            return $this->ratingRepo->update($request, $id);
        });
    }

    public function deleteRating($id)
    {
        return DB::transaction(function () use ($id) {
            return $this->ratingRepo->delete($id);
        });
    }
}
