<?php

namespace App\Models;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function path()
    {
        return '/threads/'. $this->id;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
