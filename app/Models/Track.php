<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'path'];

    public function getUrlPath(){
        return Storage::url($this->path);
    }

    public function deletePath(){
        if($this->path != "public/paths/music.mp3")
            Storage::delete($this->path);
    }

    public function player(){
        return $this->belongsTo(Player::class);
    }
}
