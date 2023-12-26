<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Illuminate\Console\Command;

class TransactionExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction_expired:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description transaction approvel, this is your comment for check every day to approvel, if date expired approvel more than date now then that approvel will be';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $getTransaction = Transaction::where('expired_transaction', '<', now())
            ->where('status_transaction', '!=', 'disetujui')
            ->where('is_expired', '=', null)
            ->get();

        foreach ($getTransaction as $key => $item) {
            $transactionOne = Transaction::find($item->id);
            $transactionOne->is_expired = true;
            $transactionOne->save();
        }

        \Log::info("Cron is working fine!");
    }
}
