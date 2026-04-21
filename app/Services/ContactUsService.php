<?php

namespace App\Services;

use App\Repositories\ContactUsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ContactUsService
{
    protected $contactRepo;
    public function __construct(ContactUsRepository $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function getAll($data)
    {
        return $this->contactRepo->getAll($data);
    }

    public function findId($data)
    {
        return $this->contactRepo->findId($data);
    }

    public function createContact($data)
    {
        return DB::transaction(function () use ($data) {
            $outcome = $this->validateTokenTrustile($data['token']);
            if (!$outcome['success']) {
                throw new \Exception('Captcha tidak valid atau sudah kedaluwarsa');
            }
            return $this->contactRepo->store($data);
        });
    }

    public function updateContact($data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            return $this->contactRepo->update($data, $id);
        });
    }

    public function deleteContact($id)
    {
        return DB::transaction(function () use ($id) {
            return $this->contactRepo->delete($id);
        });
    }

    private function validateTokenTrustile($token)
    {
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => env('TURNSTILE_SECRET_KEY'),
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        return $response->json();
    }
}
