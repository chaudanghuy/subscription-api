<?php

namespace App\Services\Notification;

use App\Mail\PostSubscribed;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\MailHistory;
use App\Repositories\ClientRepository;

class MailNotification implements NotificationFactory
{

    private Subscriber $subscriber;
    private Post $post;
    
    public function initData(Subscriber $subscriber, Post $post)
    {
        $this->subscriber = $subscriber;
        $this->post = $post;
        return $this;
    }

    public function notify()
    {        
        $client = (new ClientRepository)->getById($this->subscriber->client_id);
        
        Mail::to($client->email)->queue(
            new PostSubscribed([
                'title' => $this->post->title,
                'body' => $this->post->description
            ])
        );

        return $this;
    }

    public function logHistory()
    {
        MailHistory::create([
            'post_id' => $this->post->id,
            'subscriber_id' => $this->subscriber->id,
            'delivered' => 1,
        ]);
    }
}