<?php

namespace App\Repositories;

use App\Models\Website;

class WebsiteRepository
{
    public function getById($id)
    {
        return Website::where('id', $id)->first();
    }

    public function deleteById($id)
    {
        return $this->getById($id)->delete();
    }
}
