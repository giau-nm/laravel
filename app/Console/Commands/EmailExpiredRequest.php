<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\EmailHistoryRepository;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EmailExpiredRequest extends Command
{
    /** @var  RequestRepository */
    private $requestRepository;

    /** @var  EmailHistoryRepo */
    private $emailHistoryRepo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:expired-request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to expired request';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    }
}
