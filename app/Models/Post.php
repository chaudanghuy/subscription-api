<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title', 'slug', 'description', 'website_id'
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function histories()
    {
        return $this->belongsToMany(MailHistory::class, 'mail_histories');
    }
}
