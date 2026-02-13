<?php

namespace App\Jobs;

use App\Repositories\DepositRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckExpDepositJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $depositId;
    /**
     * Create a new job instance.
     */
    public function __construct($depositId)
    {
        $this->depositId = $depositId;
    }

    /**
     * Execute the job.
     */
    public function handle(DepositRepository $depoRepo): void
    {
        $depo = $depoRepo->findId($this->depositId);

        if (!$depo) {
            throw new \Exception("Deposit Tidak Ditemukan");
        }

        if ($depo->status === 'pending') {
            $depoRepo->update([
                'status' => 'expire'
            ], $depo->id);
        }
    }
}
