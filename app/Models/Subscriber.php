<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Website;

class Subscriber extends Model
{
    use HasFactory;

    protected $table = 'subscribers';

    protected $fillable = [
        'client_id', 'website_id', 'active'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function histories()
    {
        return $this->belongsToMany(MailHistory::class, 'mail_histories');
    }
}
