<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\Client;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionRequest $request)
    {
       $subscription = Subscriber::create([
            'client_id' => Client::where('id', $request->email_id)->first()->id,
            'website_id' => Website::where('id', $request->website_id)->first()->id
        ]);

        return (new SubscriptionResource($subscription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
