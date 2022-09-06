<?php

namespace App\Console\Commands;

use App\Services\SubscriberService;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:subscriber';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to subscriber';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new SubscriberService())->sendMail();
    }
}
