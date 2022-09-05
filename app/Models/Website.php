<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $table = 'websites';

    protected $fillable = [
        'site_name', 'url'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
