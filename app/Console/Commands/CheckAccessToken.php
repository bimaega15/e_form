<?php

namespace App\Console\Commands;

use App\Http\Controllers\AccessTokenController;
use Illuminate\Console\Command;

class CheckAccessToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:access-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and refresh access token if expired';

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
        $controller = new AccessTokenController();
        $controller->index();
        $this->info('Access token checked and updated if necessary.');
    }
}
