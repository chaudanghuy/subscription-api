<?php

namespace App\Services;

use App\Events\SubscriberProcessed;
use App\Models\MailHistory;
use App\Models\Subscriber;
use App\Models\Website;
use App\Repositories\PostRepository;

class SubscriberService
{

    public function sendMail()
    {
        //Loop through website
        $websites = Website::all();

        foreach ($websites as $website) {
            $subscribers = Subscriber::where('website_id', $website->id)->get();

            foreach ( $subscribers as $subscriber ) {
                $posts = (new PostRepository())->getListPostAssociatedWithWebsite($website->id);

                foreach ( $posts as $post ) {
                    $history = MailHistory::where([
                        ['post_id', '=', $post->id],
                        ['subscriber_id', '=', $subscriber->id],
                    ])->first();                    

                    if ( !empty($history) ) {
                        continue;
                    }

                    event(new SubscriberProcessed($subscriber, $post));
                }
            }
        }
    }
}