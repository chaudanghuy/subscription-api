<?php

namespace App\Repositories;

use App\Models\MailHistory;
use App\Models\Post;
use App\Models\Subscriber;

class MailHistoryRepository
{
    public function getByPostAssociatedWithSubscriber(Post $post, Subscriber $subscriber)
    {
        return MailHistory::where([
            ['post_id', '=', $post->id],
            ['subscriber_id', '=', $subscriber->id],
        ])->first();
    }
}