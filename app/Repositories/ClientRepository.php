<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    public function getById($id)
    {
        return Client::where('id', $id)->first();
    }

    public function deleteById($id)
    {
        return $this->getById($id)->delete();
    }
}
