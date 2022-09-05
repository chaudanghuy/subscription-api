<?php

namespace App\Console\Commands;

use App\Mail\PostSubscribed;
use App\Models\MailHistory;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails.subscriber';

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
        //Loop through website
        $websites = Website::all();

        foreach ($websites as $website) {
            $subscribers = Subscriber::where('website_id', $website->id)->get();

            foreach ( $subscribers as $subscriber ) {
                $posts = Post::where('website_id', $website->id)->get();

                foreach ( $posts as $post ) {
                    $history = MailHistory::where([
                        ['post_id', '=', $post->id],
                        ['subscriber_id', '=', $subscriber->id],
                    ])->first();

                    if ( $history->id ) {
                        continue;
                    }

                    Mail::to($subscriber->client()->email)->queue(new PostSubscribed([
                        'title' => $post->title,
                        'body' => $post->description
                    ]));

                    MailHistory::create([
                        'post_id' => $post->id,
                        'subscriber_id' => $subscriber->id,
                        'delivered' => 1,
                    ]);
                }
            }
        }

    }
}
