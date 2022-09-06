<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\Client;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use App\Repositories\ClientRepository;
use App\Repositories\WebsiteRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionRequest $request)
    {
       $subscription = Subscriber::create([
            'client_id' => (new ClientRepository())->getById($request->client_id)->id,
            'website_id' => (new WebsiteRepository())->getById($request->website_id)->id,
            'active' => 1
        ]);

        return (new SubscriptionResource($subscription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
