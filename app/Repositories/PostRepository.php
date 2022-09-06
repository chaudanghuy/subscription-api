<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class PostRepository
{

    public function getPostById($id)
    {
        return Cache::remember('post_'.$id, 100, function() {
            Post::where('id',$id)->first();            
        });
    }

    public function create($request)
    {
        return Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'website_id' => $request->website_id
        ]);
    }

    public function update($request, $id)
    {
        $post = $this->getPostById($id);
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'website_id' => Website::where('id', $request->website_id)->first()->id
        ]);

        Cache::put('post_'.$id, $post);
    }

    public function deleteById($id)
    {
        return $this->getPostById($id)->delete();
    }

    public function getListPostAssociatedWithWebsite($webId)
    {
        return Post::where('website_id', $webId)->get();
    }
}
