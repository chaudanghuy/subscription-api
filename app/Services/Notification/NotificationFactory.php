<?php

namespace App\Services\Notification;

use App\Models\Post;
use App\Models\Subscriber;

interface NotificationFactory
{	
	public function initData(Subscriber $subscriber, Post $post);
	public function notify();
	public function logHistory();
}
