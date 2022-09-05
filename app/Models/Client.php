<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'first_name', 'last_name', 'email'
    ];

    public function websites()
    {
        return $this->belongsToMany(Website::class, 'subscribers', 'client_id', 'website_id');
    }
}
