<?php

namespace App\Models\Photos;

use App\Models\Tags\Tag;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photos";

    public const IMAGE_PATH = "public/images";

    public function tags()
    {
        return $this->belongsToMany(Tag::class, "image_tags");
    }
}
