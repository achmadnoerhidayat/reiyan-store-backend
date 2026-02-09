<?php

namespace App\Services;

use App\Repositories\MemberRepository;
use Illuminate\Support\Facades\DB;

class MemberService
{

    protected $memberRepo;

    public function __construct(MemberRepository $memberRepo)
    {
        $this->memberRepo = $memberRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        if (!empty($data['search'])) {
            return $this->memberRepo->getName($data['search']);
        }
        return $this->memberRepo->getAll();
    }

    public function updateMember($data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $member = $this->memberRepo->update($data, $id);
            if (!$member) {
                throw new \Exception('Member Level Tidak Ditemukan');
            }
            return $member->fresh();
        });
    }
}
