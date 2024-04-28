<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamecat extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->belongsToMany(Games::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
