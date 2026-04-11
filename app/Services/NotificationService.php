<?php

namespace App\Services;

use App\Repositories\NotificationRepository;
use Illuminate\Support\Facades\DB;

class NotificationService
{

    protected $notifRepo;
    public function __construct(NotificationRepository $notifRepo)
    {
        $this->notifRepo = $notifRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        $data['user_id'] = request()->user()->id;
        return $this->notifRepo->getAll($data);
    }

    public function update($data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $this->notifRepo->update($data, $id);
        });
    }
}
