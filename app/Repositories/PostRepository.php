<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{

    public function getPostById($id)
    {
        return Post::findFirst($id);
    }

    public function deleteById($id)
    {
        return $this->getPostById($id)->delete();
    }
}
