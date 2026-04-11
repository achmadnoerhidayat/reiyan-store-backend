<?php

namespace App\Services;

use App\Repositories\SiteContentRepository;
use Illuminate\Support\Facades\DB;

class SiteContentService
{

    protected $siteRepo;

    public function __construct(SiteContentRepository $siteRepo)
    {
        $this->siteRepo = $siteRepo;
    }

    public function getAll($data)
    {
        return $this->siteRepo->getAll($data);
    }

    public function findId($id)
    {
        return $this->siteRepo->findId($id);
    }

    public function createSite($data)
    {
        return DB::transaction(function () use ($data) {
            return $this->siteRepo->store($data);
        });
    }

    public function updateSite($data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            return $this->siteRepo->update($data, $id);
        });
    }

    public function deleteSite($id)
    {
        return DB::transaction(function () use ($id) {
            return $this->siteRepo->delete($id);
        });
    }
}
